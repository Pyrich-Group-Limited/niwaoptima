<?php

namespace App\Http\Controllers;

use App;
use Auth;
use App\Models\User;
use Milon\Barcode\DNS2D;
use App\Models\AssetModel;
use App\Models\AssetTypeModel;
use App\Models\SupplierModel;
use App\Models\BrandModel;
use App\Models\AssetsModel;
use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use Modules\Shared\Models\Branch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use App\Http\Controllers\TraitSettings;

class Asset extends Controller
{
    use TraitSettings;

    public function __construct() {
		
		 
		$lang = get_settings()['default_language'];
		App::setLocale($lang);
        $this->middleware('auth');
    }

    //return page
    public function index(Request $request) {
        $location = [];//Branch::all();
        $brand = [];//BrandModel::all();
        $type= [];//AssetTypeModel::all();
        $suppliers = [];//SupplierModel::all();
        
        $asset= AssetsModel::get();
        if($request->ajax()){
            $alldata= DataTables::of($asset)
            ->addIndexColumn()
            ->addColumn('action',function($row){
                $btn = '<a href="#" data-toggle="tooltip" data-id=" ' . $row->id . ' " data-original-title="Edit" class=" edit  btn-link">Edit </a>';
                $btn .= ' <a href="#"  data-toggle="tooltip" data-id=" ' . $row->id . '" data-original-title="Delete" class="delete text-danger  ">Delete </a> ';

                return $btn;
            })
            ->rawColumns(['Action'])
            ->make(true);
        }
        
		return view( 'asset.index',compact('location','brand','type','suppliers'));
    }

    
    /**
	 * get  detail page
	 * @return object
	 */
    public function detail($id){
        return view('asset.detail', compact('id'));
    }


    /**
     * get print label page
     * @return object
     */
    public function generatelabel($id){
        return view('asset.generate')->with('id', $id);
    }


    /**
	 * get data from database
	 * @return object
	 */
    public function getdata(){
        
        $data = DB::select("select niwa_assets.*, supplier.name as supplier, brand.name as brand, asset_type.name as type , location.name as location
        from niwa_assets left join supplier 
        on niwa_assets.supplierid = supplier.id
        left join brand 
        on niwa_assets.brandid = brand.id
        left join asset_type
        on niwa_assets.typeid = asset_type.id
        left join location
        on niwa_assets.locationid = location.id
        order by niwa_assets.created_at desc"); 
        return Datatables::of($data)
        ->addColumn('pictures',function($single){
			return '<img src="'.url('/').'/upload/assets/'.$single->picture.'" style="width:90px"/>';
        })
        ->addColumn( 'action', function ( $accountsingle ) {
            //for checkout 2 button, checkin or checkout depand the record
            //$checkout = '  <a class="dropdown-item" href="#" id="btncheckout" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkout"><i class="fa fa-check"></i> '. trans('lang.checkout').'</a>';

            if($accountsingle->checkstatus===2){
                    
                    $checkout = '<a class="dropdown-item" href="#" id="btncheckin" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkin"><i class="fa fa-check"></i> '. trans('lang.checkin').'</a>';
                
            }else{
                    $checkout = '<a class="dropdown-item" href="#" id="btncheckout" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#checkout"><i class="fa fa-check"></i> '. trans('lang.checkout').'</a>';
            }

            return '
                <div class="btn-group">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu actionmenu">
                '.$checkout.'
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="'.url('/').'/assetlist/detail/'.$accountsingle->id.'"id="btndetail" customdata='.$accountsingle->id.'  ><i class="fa fa-file-text"></i> '. trans('lang.detail').'</a>
                <a class="dropdown-item" href="#" id="btnedit" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#edit"><i class="fa fa-pencil"></i> '. trans('lang.edit').'</a>
                <a class="dropdown-item" href="#" id="btnedit" customdata='.$accountsingle->id.'  data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i> '. trans('lang.delete').'</a>
                </div>
            </div>';
           
        } )->rawColumns(['pictures', 'action'])
        ->make(true);		
    }



    /**
     * get single data by assets id for history
     * @param integer $id
     * @return object
     */

    public function historyassetbyid( Request $request ) {
        $id            = $request->input( 'assetid' );

      $data = DB::select("select asset_history.*, niwa_assets.name as assetname,  IFNULL(users.first_name, '-') as employeename

        from asset_history left join niwa_assets  
        on asset_history.assetid = niwa_assets.id
        left join users 
        on asset_history.employeeid = users.id
        where asset_history.assetid = '$id'
        order by asset_history.created_at desc"); 
        return Datatables::of($data)
        
        ->addColumn('status',function($single){
            if($single->status=='1'){
                $status = trans('lang.checkout');
            }
             if($single->status=='2'){
                $status = trans('lang.checkin');
            }
            return $status;
        })

         ->addColumn('date',function($single){

            
            return date(get_settings()['site_date_format'], strtotime($single->date));
        })
        ->rawColumns(['status','date'])
        ->make(true);
        
    }

    /**
	 * get single data 
	 * @param integer $id
	 * @return object
	 */

    public function byid( Request $request ) {
        $id            = $request->input( 'id' );

        $data = DB::table('niwa_assets')->select('niwa_assets.*','niwa_assets.name as assetname','niwa_assets.description as assetdescription', 'niwa_assets.created_at as assetcreated_at', 'niwa_assets.updated_at as assetupdated_at', 'niwa_assets.description as description', 'brand.*', 'brand.name as brand','asset_type.name as type','supplier.name as supplier','location.name as location')
        ->join('brand', 'brand.id', '=', 'niwa_assets.brandid')
        ->join('asset_type', 'asset_type.id', '=', 'niwa_assets.typeid')
        ->join('supplier', 'supplier.id', '=', 'niwa_assets.supplierid')
        ->join('location', 'location.id', '=', 'niwa_assets.locationid')
        ->where('niwa_assets.id',$id)
        ->first();
        
        if ( $data ) {

            //set status
            if($data->status=='1'){
                $status = trans('lang.readytodeploy');
            }
            if($data->status=='2'){
                $status = trans('lang.pending');
            }
            if($data->status=='3'){
                $status = trans('lang.archived');
            }
            if($data->status=='4'){
                $status = trans('lang.broken');
            }
            if($data->status=='5'){
                $status = trans('lang.lost');
            }
            if($data->status=='6'){
                $status = trans('lang.outofrepair');
            }

            //get date format setting
            // $setting = DB::table('settings')->where('id', '1')->first();


            //for warranty
            $prchasedate = strtotime($data->purchasedate);
            $nextexpired = date(get_settings()['site_date_format'], strtotime($data->warranty.' month', $prchasedate));

			$res['success'] = 'success';
            $res['message']= $data;
            $res['assetcreated_at']= date(get_settings()['site_date_format'], strtotime($data->assetcreated_at));
            $res['assetupdated_at']= date(get_settings()['site_date_format'], strtotime($data->updated_at));
            $res['assetpurchasedate']= date(get_settings()['site_date_format'], strtotime($data->purchasedate));
            $res['assetcost']= get_settings()['site_currency_symbol'].$data->cost;
            $res['assetwarranty']= $data->warranty.' '.trans('lang.month').' - ('.$nextexpired.')';
            $res['assetstatus']= $status;
            // Create an instance of the DNS2D class
$barcode = new DNS2D();

// Call the getBarcodePNG method on the instance
$res['assetbarcode'] = '<img src="data:image/png;base64,' . $barcode->getBarcodePNG($data->assettag, 'QRCODE') . '" alt="barcode" width="70" />';

           // $res['assetbarcode'] = '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG($data->assettag, 'QRCODE') . '" alt="barcode" width="70"  />';

            $res['assetimage']  = url('/').'/upload/assets/'.$data->picture;
        } else{
            $res['success'] = 'failed';
        }
        return response( $res );
        
    }


    /**
	 * insert data  to database
	 *
	 * @param integer  $supplierid
     * @param integer  $typeid
     * @param integer  $brandid
	 * @param string  $assettag
     * @param string  $name
     * @param string  $serial
     * @param string  $quantity
     * @param string  $purchasedate
     * @param string  $cost
     * @param string  $warranty
     * @param string  $status
     * @param string  $picture
     * @param string  $description
     * @return object
	 */
    public function save(Request $request){
        $supplierid         = $request->input( 'supplierid' );
        $locationid         = $request->input( 'locationid' );
        $typeid             = $request->input( 'typeid' );
        $brandid             = $request->input( 'brandid' );
        $assettag           = $request->input( 'assettag' );
        $name               = $request->input( 'name' );
        $serial             = $request->input( 'serial' );
        $quantity           = $request->input( 'quantity' );
        $purchasedate       = $request->input( 'purchasedate' );
        $cost               = $request->input( 'cost' );
        $warranty           = $request->input( 'warranty' );
        $status             = $request->input( 'status' );
        $checkstatus        = 0;
        $picture            = $request->file( 'picture' );
        $description        = $request->input( 'description' );
        $defaultimage       = 'pic.png';
        $created_at         = date("Y-m-d H:i:s");
        $updated_at         = date("Y-m-d H:i:s");
        $message = ['picture.mimes'=>trans('lang.upload_error')];

        $emailcheck = DB::table('niwa_assets')
        ->where('assettag', '=', $assettag)
        ->first();
    
        if($emailcheck){
            $res['message'] = 'exist';  
        }
        else{ 
      
            if($request->hasFile('picture')) {
                $this->validate($request, ['picture' => 'mimes:jpeg,png,jpg|max:5120'],$message);
                $picturename  = date('mdYHis').uniqid().$request->file('picture')->getClientOriginalName();
                $request->file('picture')->move(public_path("/upload/assets"), $picturename);
                $data       = array('name'=>$name, 
                            'locationid'=>$locationid,
                            'supplierid'=>$supplierid,
                            'brandid'=>$brandid,
                            'typeid'=>$typeid,
                            'assettag'=>$assettag,
                            'serial'=>$serial,
                            'quantity'=>$quantity,
                            'purchasedate'=>$purchasedate,
                            'checkstatus'=>0,
                            'cost'=>$cost,
                            'warranty'=>$warranty,
                            'status'=>$status,
                            'picture'=>$picturename,
                            'description'=>$description,
                            'created_at'=>$created_at,
                            'updated_at'=>$updated_at);
                $insert     = DB::table( 'niwa_assets' )->insert( $data ); 

            }else{
                $data       = array('name'=>$name, 
                                'locationid'=>$locationid,
                                'supplierid'=>$supplierid,
                                'typeid'=>$typeid,
                                'brandid'=>$brandid,
                                'assettag'=>$assettag,
                                'serial'=>$serial,
                                'quantity'=>$quantity,
                                'purchasedate'=>$purchasedate,
                                'cost'=>$cost,
                                'checkstatus'=>0,
                                'warranty'=>$warranty,
                                'status'=>$status,
                                'picture'=>$defaultimage,
                                'description'=>$description,
                                'created_at'=>$created_at,
                                'updated_at'=>$updated_at);

                $insert     = DB::table( 'niwa_assets' )->insert( $data );

            }

            if ( $insert ) {
                $res['message'] = 'success';
                
            } else{
                $res['message'] = 'failed';
            }
        }
        return response( $res );
    }

    /**
	 * update data  to database
	 *
	 * @param string  $fullname
	 * @param string  $email
     * @param string  $picture
     * @param string  $gender
     * @param string  $city
     * @param string  $country
     * @param string  $phone
	 * @return object
	 */
    public function update(Request $request){
        $id             = $request->input( 'id' );
        $locationid     = $request->input( 'locationid' );
        $supplierid     = $request->input( 'supplierid' );
        $typeid         = $request->input( 'typeid' );
        $brandid        = $request->input( 'brandid' );
        $assettag       = $request->input( 'assettag' );
        $name           = $request->input( 'name' );
        $serial         = $request->input( 'serial' );
        $quantity       = $request->input( 'quantity' );
        $purchasedate   = $request->input( 'purchasedate' );
        $cost           = $request->input( 'cost' );
        $warranty       = $request->input( 'warranty' );
        $status         = $request->input( 'status' );
        $picture        = $request->file( 'picture' );
        $description    = $request->input( 'description' );
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $message = ['picture.mimes'=>trans('lang.upload_error')];

        $tagcheck = DB::table('niwa_assets')
        ->where('assettag', '=', $assettag)
        ->where('id', '!=', $id)
        ->first();
    
        if($tagcheck){
            $res['message'] = 'exist';  
        }
        else{ 

        if($request->hasFile('picture')) {
            $this->validate($request, ['picture' => 'mimes:jpeg,png,jpg|max:2048'],$message);
            $picturename  = date('mdYHis').uniqid().$request->file('picture')->getClientOriginalName();
            $request->file('picture')->move(public_path("/upload/assets"), $picturename);

            $update = DB::table( 'niwa_assets' )->where( 'id', $id )
            ->update(
                [
                'name'                => $name,
                'locationid'          => $locationid,    
                'supplierid'          => $supplierid,
                'brandid'             => $brandid,
                'typeid'              => $typeid,
                'assettag'            => $assettag,
                'serial'              => $serial,
                'quantity'            => $quantity,
                'purchasedate'        => $purchasedate,
                'cost'                => $cost,
                'warranty'            => $warranty,
                'status'              => $status,
                'description'         => $description,
                'picture'             => $picturename,
                'updated_at'          => $updated_at
                ]
            );
        }else{
            $update = DB::table( 'niwa_assets' )->where( 'id', $id )
            ->update(
                [
                    'name'                => $name,
                    'locationid'          => $locationid,
                    'supplierid'          => $supplierid,
                    'brandid'             => $brandid,
                    'typeid'              => $typeid,
                    'assettag'            => $assettag,
                    'serial'              => $serial,
                    'quantity'            => $quantity,
                    'purchasedate'        => $purchasedate,
                    'cost'                => $cost,
                    'warranty'            => $warranty,
                    'status'              => $status,
                    'description'         => $description,
                    'updated_at'          => $updated_at
                ]
            );
        }

            if ( $update ) {
                $res['message'] = 'success';
                
            } else{
                $res['message'] = 'failed';
            }
        }
        return response( $res );
    }

    /**
	 * insert checkout data  to database
	 *
	 * @param integer  $assetid
     * @param integer  $employeeid
     * @param string  $date
     * @param integer  $status
	 * @return object
	 */
    public function savecheckout(Request $request){
        $assetid        = $request->input( 'assetid' );
        $employeeid     = $request->input( 'employeeid' );
        $date           = $request->input( 'checkoutdate' );
        $status         = '1'; //checkout = 1
        $checkstatus    = '2'; 
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array('assetid'=>$assetid, 'status'=>$status,'employeeid'=>$employeeid,'date'=>$date,'created_at'=>$created_at, 'updated_at'=>$updated_at);
		$insert         = DB::table( 'asset_history' )->insert( $data );

		if ( $insert ) {

            //set status in table asset
            $update = DB::table( 'niwa_assets' )->where( 'id', $assetid )
            ->update(
                [
                    'checkstatus'         => $checkstatus,
                    'updated_at'          => $updated_at
                ]
            );

			$res['success'] = 'success';
        } else{
            $res['success'] = 'failed';
        }
        
        return response( $res );
    }

    /**
     * insert checkin data  to database
     *
     * @param integer  $assetid
     * @param integer  $employeeid
     * @param string  $date
     * @param integer  $status
     * @return object
     */
    public function savecheckin(Request $request){
        $assetid        = $request->input( 'assetid' );
        $employeeid     = $request->input( 'employeeid' );
        $date           = $request->input( 'checkindate' );
        $status         = '2'; //checkout = 1
        $checkstatus    = '0'; 
        $created_at     = date("Y-m-d H:i:s");
        $updated_at     = date("Y-m-d H:i:s");
        $data           = array('assetid'=>$assetid, 'status'=>$status,'employeeid'=>$employeeid,'date'=>$date,'created_at'=>$created_at, 'updated_at'=>$updated_at);
        $insert         = DB::table( 'asset_history' )->insert( $data );

        if ( $insert ) {
            //set status in table asset
            $update = DB::table( 'niwa_assets' )->where( 'id', $assetid )
            ->update(
                [
                    'checkstatus'         => $checkstatus,
                    'updated_at'          => $updated_at
                ]
            );
            $res['success'] = 'success';
        } else{
            $res['success'] = 'failed';
        }
        
        return response( $res );
    }

    /**
	 * get all  from database
	 * @return object
	 */
    public function getrows(){
        $data = DB::table('niwa_assets')->get();
        if ( $data ) {
			$res['success'] = true;
			$res['message']= $data;
        }
        return response( $res );
    }


     /**
	 * delete to database
	 *
	 * @param integer $id
	 * @return object
	 */

	public function delete( Request $request ) {
        $id = $request->input( 'id' );
        $getfilename = DB::table('niwa_assets')
        ->where('id', '=', $id)
        ->first();

        $delete = DB::table( 'niwa_assets' )->where( 'id', $id )->delete();
        $notdefaultimage = 'pic.png';
        $filename = $getfilename->picture;

        if($filename != $notdefaultimage){
            $deleteimage = File::delete('upload/assets/'.$getfilename->picture);
        }

                if ( $delete ) {
                    $res['success'] = 'success';
                } else{
                    $res['success'] = 'failed';
                }
            return response( $res );
        
    }
    

    /**
	 * Generate Product Code
	 *
	 * @return object
	 */

	public function generateproductcode() {
        $lastid = AssetsModel::orderBy('id', 'desc')->first();
    
        if ( $lastid ) {
			$res['success'] = 'success';
			$res['message']=  'AST'.date('ymd').''.$lastid->id + 1;
        } else{
            $res['message']=  'AST'.date('ymd').'1';
        }
        return response( $res );
    }
}
