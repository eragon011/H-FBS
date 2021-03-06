<?php namespace App\Http\Controllers\App;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Services\Strategy\Context;
use App\Services\Factory\LevelPatientFactory;
use App\Services\Factory\LevelPatient;
use App\Services\Suggestion;
use App\Services\Strategy\OperationCheck;
use App\User;
use Illuminate\Http\Request;

class AppController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (\Auth::user()->isAdmin(\Auth::user()->name)) {
            return redirect()->action('App\AppController@admin');
        } else if (\Auth::user()->isPatient(\Auth::user()->name)) {
            return redirect()->action('App\AppController@patient');
        } else {
            return redirect('auth/login');
        }
    }

    public function admin()
    {

        if(\Auth::user()->isAdmin(\Auth::user()->name)){
            $patients = User::where('name', '!=', 'Admin')->get();
            return view('app/h-fbs/admin')->with(['patients' => $patients]);
        }else{
            return redirect()->action('App\AppController@index');
        }

        //return view('app/h-fbs/admin');
    }

    public function adminWithPatient($id)
    {

        try {
            $user = User::find($id);
            $bp = explode("/", $user->patient->bp);
            $context = new Context(new OperationCheck());
            $levelText = $context->executeStrategy($user->patient->fbs, $bp[0], $bp[1], $user->patient->complication);

            $level = new LevelPatientFactory();
            $level = $level->getLevelPatient($levelText);
            return view('app/h-fbs/adminwithpatient')
                ->with(['user' => $user])
                ->with(['level' => $level->draw()]);

        } catch (\Exception $e) {
            $patient = new patient();
            $patient->bp = "0/0";
            $patient->fbs = "0";
            $patient->suggestion = "0";
            $patient->complication = "0";
            $patient->user_id = $id;
            $patient->save();

            return redirect('app/h-fbs/admin/' . $id);
        }


    }

    public function patient()
    {


        try {
            $user = User::find(\Auth::user()->id);
            $bp = explode("/", $user->patient->bp);

            $context = new Context(new OperationCheck());
            $levelText = $context->executeStrategy($user->patient->fbs, $bp[0], $bp[1], $user->patient->complication);

            $level = new LevelPatientFactory();
            $level = $level->getLevelPatient($levelText);

            return view('app/h-fbs/patient')
                ->with(['user' => $user])
                ->with(['level' => $level->draw()])
                ->with(["levelMessege"=>$levelText]);

        } catch (\Exception $e) {
            $patient = new patient();
            $patient->bp = "0/0";
            $patient->fbs = "0";
            $patient->suggestion = "0";
            $patient->complication = "0";
            $patient->user_id = \Auth::user()->id;
            $patient->save();

            return redirect('app/h-fbs/patient/');
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     *
     *
     */
    public function update(Request $request, $id)
    {
        $use = User::find($id);

        if ($use->patient->id) {
            $user = Patient::find($use->patient->id);
            $user->bp = $request->input('bp');
            $user->fbs = $request->input('fbs');
            $user->complication = $request->input('complication');

            if ($request->input('syssuggestion')) {

                $bp = explode("/", $user->bp);

                $context = new Context(new OperationCheck());
                $levelText = $context->executeStrategy($user->fbs, $bp[0], $bp[1], $user->complication);


                $user->suggestion = Suggestion::getSuggestion($levelText);


            } else {
                $user->suggestion = $request->input('suggestion');
            }


            $user->save();

        }

        return redirect('app/h-fbs/admin/' . $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
