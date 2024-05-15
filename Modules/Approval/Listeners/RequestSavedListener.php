<?php

namespace Modules\Approval\Listeners;

use App\Models\Role;
use App\Models\User;
use Modules\Approval\Events\RequestSavedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Modules\Approval\Http\Enum\ActionEnum;
use Modules\Approval\Models\Flow;
use Modules\Approval\Models\Request;
use Modules\Approval\Models\Timeline;
use Modules\Approval\Notifications\RequestApprovedNotification;
use Modules\Approval\Notifications\RequestDeclinedNotification;
use Modules\Approval\Notifications\RequestSavedNotification;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;
use Illuminate\Support\Facades\Log;
use Modules\EmployerManager\Models\Employer;

class RequestSavedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param RequestSavedEvent $event
     * @return void
     */
    public function handle(RequestSavedEvent $event)
    {
        $request = $event->request;

        
        //add a row to approval timeline for new request
        //else add a row to approval timeline based on current step/order
        $timeline = $request->timelines()->create([
            'flow_id' => Flow::where('approval_order', $request->order)->where('type_id', $request->type_id)->first()->id,
            'action_id' => $request->action_id,
            'staff_id' => auth()->user()->staff->id,
            'comments' => session('comments'),
        ]);

        //if new approval request - CREATED
        if ($event->request && $event->request->action_id == 1) {
            //notify request creator

            $email = !empty($request->staff->user) ? $request->staff->user->email :
             Employer::find($request->staff_id)->company_email;
            /* Notification::route('mail', $email)
                ->notify(new RequestSavedNotification($event->request)); */
                try {
                    Notification::route('mail', $email)
                        ->notify(new RequestSavedNotification($event->request));
                } catch (\Exception $exception) {
                    // Handle the exception for this specific notification
                    Log::error("Error notifying request creator: " . $exception->getMessage());
                }
        }



        /*
         update approval request row based on action taken
        to show next step/order
        */
        //dd($request->type->flows);
        //dump($request);
        switch (ActionEnum::from($request->action_id)) {
            case ActionEnum::CREATE: {
                };
            case ActionEnum::APPROVE: {
                };
            case ActionEnum::MODIFY: {
                    //check if last step
                    $last_step = $request->type->flows()
                        ->where('approval_order', '>', $request->order)
                        ->where('status', 1)
                        ->orderBy('approval_order', 'DESC')
                        ->first();

                    // - handle last step
                    if ($last_step == null) {
                        //if ($last_step->approval_order == $request->order) {
                        //send email to creator about completion
                        $email = !empty($request->staff->user) ? $request->staff->user->email :
             Employer::find($request->staff_id)->company_email;
                        /* Notification::route('mail', $email)
                            ->notify(new RequestApprovedNotification($event->request)); */
                            try {
                                Notification::route('mail', $email)
                                    ->notify(new RequestApprovedNotification($event->request));
                            } catch (\Exception $exception) {
                                // Handle the exception for this specific notification
                                Log::error("Error notifying request creator: " . $exception->getMessage());
                            }
                    }

                    //if has next step
                    $next_step = $request->type->flows()
                        ->where('approval_order', '>', $request->order)
                        ->where('status', 1)
                        ->orderBy('approval_order', 'ASC')
                        ->first();

                    //update request to show next step or null if non
                    //$request->next_step = $next_step ? $next_step->approval_order : null;
                    $lastStep = $request->type->flows()
    //->where('approval_order', '>', $request->order)
    ->where('status', 1)
    ->latest('approval_order')
    ->first();
    $lastRequest = Request::find($request->id);
    $final = $lastRequest->type->flows->count();
                    $request->next_step = $next_step ? $next_step->approval_order : 1;
                    //$request->status = ($request->order === $final) ? 1 : 0; //request is completed or closed
                    $request->saveQuietly(); //do not trigger notifications $mr->status = ($request->order === 1) ? 1 : 0;

                    if ($next_step) {
                        /*
                        Notify next step users if there is a next step
                        based on thier scope and roles
                        */

                        //get flow roles
                        $roles = $next_step->roles;
                        $roles = $roles->pluck('id');

                        //get role names
                        $rn = Role::whereIn('id', $roles)->get();

                        //-get user emails based on roles
                        $all_users = [];
                        if ($next_step->approval_scopeable_type == null) {
                            //get users with specified roles only
                            $all_users = User::role($rn->pluck('name'))->get();
                        } else {
                            //-get users in next flow scope and roles
                            //dd($next_step->approval_scopeable->staff);
                            $scope_id = $next_step->approval_scopeable_id;
                            $scope_type = $next_step->approval_scopeable_type;
                            $all_users = User::role($rn->pluck('name'))
                                ->whereHas('staff', function ($query) use ($scope_type, $scope_id) {
                                    return $query->when($scope_type == Department::class, function ($query) use ($scope_id) {
                                        return $query->where('department_id', $scope_id);
                                    })->when($scope_type == Branch::class, function ($query) use ($scope_id) {
                                        return $query->where('branch_id', $scope_id);
                                    });
                                })
                                ->get();
                            //dd($all_users);
                        }

                        //notify request receiver | next step scope
                        //-send notification
                        //Notification::send($all_users, new RequestSavedNotification($event->request, 0));
                        try {
                            Notification::send($all_users, new RequestSavedNotification($event->request, 0));
                        } catch (\Exception $exception) {
                            // Handle the exception for this specific notification
                            Log::error("Error notifying request creator: " . $exception->getMessage());
                        }
                    }
                };
                break;
            case ActionEnum::RETURN: {
                    //get flow by id
                    //select previous order with active status
                    //where order is less than current

                    $prev_step = $request->type->flows()
                        ->where('approval_order', '<', $request->order)
                        ->where('status', 1)
                        ->orderBy('approval_order', 'DESC')
                        ->first();

                    //set next step to current order
                    //$request->next_step = $request->order;
                    //$request->saveQuietly();
                    $next_step = $request->type->flows()
                        ->where('approval_order', '>', $request->order)
                        ->where('status', 1)
                        ->orderBy('approval_order', 'ASC')
                        ->first();
                    /* dump($request);
                        dump($next_step->approval_order);
                        dump($request->order);
                        dd($prev_step ? $next_step->approval_order : $request->order);
                    //update request to show next step or null if non
                    $request->next_step = $prev_step ? $next_step->approval_order : $request->order;
                    $request->saveQuietly(); */

                    //Notify current order user(s)
                    if ($prev_step) {
                        $current_step = $request->type->flows()
                            ->where('approval_order', '>', $request->order)
                            ->where('status', 1)
                            ->orderBy('approval_order', 'ASC')
                            ->first();
                    } else {
                        $current_step = $request->type->flows()
                            ->where('approval_order', $request->order)
                            ->where('status', 1)
                            ->orderBy('approval_order', 'ASC')
                            ->first();
                    }


                    if ($current_step) {
                        $roles = $current_step->roles;
                        $roles = $roles->pluck('id');

                        $rn = Role::whereIn('id', $roles)->get();

                        $all_users = [];
                        if ($current_step->approval_scopeable_type == null) {
                            $all_users = User::role($rn->pluck('name'))->get();
                        } else {
                            $scope_id = $current_step->approval_scopeable_id;
                            $scope_type = $current_step->approval_scopeable_type;
                            $all_users = User::role($rn->pluck('name'))
                                ->whereHas('staff', function ($query) use ($scope_type, $scope_id) {
                                    return $query->when($scope_type == Department::class, function ($query) use ($scope_id) {
                                        return $query->where('department_id', $scope_id);
                                    })->when($scope_type == Branch::class, function ($query) use ($scope_id) {
                                        return $query->where('branch_id', $scope_id);
                                    });
                                })
                                ->get();
                        }

                        //Notification::send($all_users, new RequestSavedNotification($event->request, 0));
                        try {
                            Notification::send($all_users, new RequestSavedNotification($event->request, 0));
                        } catch (\Exception $exception) {
                            // Handle the exception for this specific notification
                            Log::error("Error notifying request creator: " . $exception->getMessage());
                        }
                    }
                };
                break;
            case ActionEnum::DECLINE: {
                    //close process
                    $request->status = 1;
                    $request->saveQuietly();

                    //notify creator of declined status
                    $email = !empty($request->staff->user) ? $request->staff->user->email :
             Employer::find($request->staff_id)->company_email;
                    /* Notification::route('mail', $email)
                        ->notify(new RequestDeclinedNotification($event->request)); */
                        try {
                            Notification::route('mail', $email)
                        ->notify(new RequestDeclinedNotification($event->request));
                        } catch (\Exception $exception) {
                            // Handle the exception for this specific notification
                            Log::error("Error notifying request creator: " . $exception->getMessage());
                        }
                };
                break;
            default: {
                    echo 'heere';
                }
        }

        //dd();
    }
}
