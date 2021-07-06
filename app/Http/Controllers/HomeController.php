<?php
namespace App\Http\Controllers;
use DB;
use Auth;
use App\TagList;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\ambulance;
use App\models\locations;
use App\models\cases;
use App\models\pcr_cases;
use App\models\pcrs;
use App\Models\patients;


class HomeController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {       
        $ambulances= DB::table('ambulances')->where('status','=','inservice')->get();
        $locations=DB::table('locations')->where('is_hospital','=',1)->get();
        $cases=DB::table('cases')->get();
        $rescuers=DB::table('rescuers')->get();
       
       return view('newhome.index', ['ambulances' => $ambulances,'locations'=>$locations,'cases'=>$cases,'rescuers'=>$rescuers]);  
    }
    public function create(Request $request){
      
        $requestt = request()->all();
        $cases=$request->cases;

      
        $destinationfrom=$request->input('locationfrom');
        $destinationto=$request->input('locationto');
        $patientname=$request->input('name');
        $patientage=$request->input('age');
        $accompaniedperson=$request->input('accompaniedperson');
        $nationality=$request->input('nationality');
        $uhkit=$request->input('ukit');
        $missionleader=$request->input('missionleader');
        $driver=$request->input('driver');
        $rescuer1=$request->input(
            'rescuers1'
        );
        $rescuer2=$request->input(
            'rescuers2'
        );
        $rescuer3=$request->input(
            'rescuers3'
        );
        $rescuer4=$request->input('rescuers4');
        $patient=$this->create_patients_table($patientname,$patientage,$nationality);
        $patient->save();
        $ambulance_id=$request->input('ambulance');
        $pcr=$this->create_pcr($ambulance_id,$patient->id);
         $number_cases =count($_POST['text_cases']);
        for ($i=0;$i<$number_cases;$i++){
            $case=DB::table('cases')->select('id')->where('descr','=',$_POST['select_cases'][$i])->first();
           
           
            if(trim($_POST['text_cases'][$i]!='' and trim($_POST['select_cases'][$i]!=''))){
               return 123;       }
            if(trim($_POST['text_cases'][$i]!='')){
                
                $pcr_cases=$this->create_pcr_cases($case->id,$pcr->id);
            }
            if(trim($_POST['select_cases'][$i]!='')){

                $pcr_cases=$this->create_pcr_cases($case->id,$pcr->id);
      
            }
        } 
    }
    public function create_pcr_cases($case_id,$pcr_id){
       
        return pcr_cases::firstorCreate([     
            'pcr_id'=>$pcr_id,
            'case_id'=>$case_id,
        ]);
    }
    public function create_pcr($ambulance_id,$patient_id){
        return pcrs::Create([
            'patient_id' =>$patient_id,
            'ambulance_id' => $ambulance_id,
            'identifier' => 1,
            ]);
        }
    public function create_patients_table($name,$age,$nationality){
        return patients::firstOrCreate([
            'name' => $name,
            'nationality' => $nationality,
            'age' => $age,
            'creator_id'=>Auth::user()->id,
        ]);
    }
    public function addMore()
    {
        return view("addMore");
    }
    public function addMorePost(Request $request)
    {
        $rules = [];


        foreach($request->input('name') as $key => $value) {
            $rules["name.{$key}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {


            foreach($request->input('name') as $key => $value) {
                TagList::create(['name'=>$value]);
            }


            return response()->json(['success'=>'done']);
        }

    
}
}
