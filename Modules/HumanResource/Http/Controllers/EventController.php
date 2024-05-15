<?php

namespace Modules\HumanResource\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shared\Models\Department;
use Modules\HumanResource\Models\Event;
use Modules\HumanResource\Models\Ranking;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EventCreatedNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('humanresource::events.index');
    }

    public function index_json()
    {

    $events = Event::all(['id', 'title', 'start', 'end']); // Fetch the events
        return response()->json($events); 
    }

    public function index_json_data()
    {
      //  $events = Event::all(['id', 'title', 'start', 'end']); // Fetch the events
    $departments = Department::all(['id', 'name']); // Fetch the departments
    $rankings = Ranking::all(['id', 'name']); // Fetch the rankings

    return response()->json([
        'departments' => $departments,
        'rankings' => $rankings,
    ]);
    }

    public function store(Request $request)
    {
        $eventData = [
            'title' => $request->input('title'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
        ];
        
        $event = Event::create($eventData);
        
        $departmentIds = $request->input('department_ids');
        $rankingIds = $request->input('ranking_ids');
        
        $event->departments()->sync($departmentIds);
        $event->rankings()->sync($rankingIds);
        
        foreach ($departmentIds as $departmentId) {
            foreach ($rankingIds as $rankingId) {
                $event->departmentRankings()->create([
                    'department_id' => $departmentId,
                    'ranking_id' => $rankingId,
                ]);
        
            }
        }
        
        // Get staff member IDs with the selected department_ids and ranking_ids
$staffMemberIds = DB::table('staff')
    ->whereIn('department_id', $departmentIds)
    ->whereIn('ranking_id', $rankingIds)
    ->pluck('user_id');

// Get users (staff members) with the selected department_ids and ranking_ids
$staffMembers = User::whereIn('id', $staffMemberIds)
    ->with("staff")
    ->get();
    

// Send notifications to each staff member's associated user
foreach ($staffMembers as $staffMember) {
    $user = $staffMember->staff->user;
    if ($user) {
        Notification::send($user, new EventCreatedNotification($eventData));
    }
}

        return response()->json(['message' => 'Event created successfully']);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
$event->title = $request->input('title');
$event->start = $request->input('start');
$event->end = $request->input('end');
$event->save();

$departmentIds = $request->input('department_ids');
$rankingIds = $request->input('ranking_ids');

// Sync departments and rankings
$event->departments()->sync($departmentIds);
$event->rankings()->sync($rankingIds);

// Update department_ranking pivot table
$event->departmentRankings()->delete(); // Delete existing associations

$departmentRankingData = [];
foreach ($departmentIds as $departmentId) {
    foreach ($rankingIds as $rankingId) {
        $departmentRankingData[] = [
            'department_id' => $departmentId,
            'ranking_id' => $rankingId,
        ];
    }
}

$event->departmentRankings()->createMany($departmentRankingData);

$eventData = [
    'title' => $request->input('title'),
    'start' => $request->input('start'),
    'end' => $request->input('end'),
];

 // Get staff member IDs with the selected department_ids and ranking_ids
$staffMemberIds = DB::table('staff')
->whereIn('department_id', $departmentIds)
->whereIn('ranking_id', $rankingIds)
->pluck('user_id');

// Get users (staff members) with the selected department_ids and ranking_ids
$staffMembers = User::whereIn('id', $staffMemberIds)
->with("staff")
->get();

// Send notifications to each staff member's associated user
foreach ($staffMembers as $staffMember) {
 $user = $staffMember->staff->user;
 if ($user) {
     Notification::send($user, new EventCreatedNotification($eventData));
 }
}

return response()->json(['message' => 'Event updated successfully']);

        /* $event = Event::findOrFail($id);
        $event->title = $request->input('title');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->save();

        $departmentIds = $request->input('department_ids');
        $rankingIds = $request->input('ranking_ids');

        // Sync departments and rankings
        $event->departments()->sync($departmentIds);
        $event->rankings()->sync($rankingIds);

        // Update department_ranking pivot table
        $event->departmentRankings()->delete(); // Delete existing associations
        foreach ($departmentIds as $departmentId) {
            foreach ($rankingIds as $rankingId) {
                $event->departmentRankings()->create([
                    'department_id' => $departmentId,
                    'ranking_id' => $rankingId,
                ]);
            }
        }
        
 */
        
    }


    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete associated department rankings
        $event->departmentRankings()->delete();

        // Delete the event itself
        $event->delete();

        return response()->json(['message' => 'Event and associated records deleted successfully']);
    }
}
