<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\HospitalDetail;
use App\Models\Patient;
use App\Models\PatientMedicineDetail;
use App\Models\Prescription;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        // select SUM(payment_amount) as total from payments WHERE date_of_payment='18-04-2021'
        // return $totalPayment;
        $isLoggedIn = $request->session()->get('LoggedUser');
        if ($isLoggedIn) {
            $date = date('d-m-Y');
            $totalPayment = DB::table('payments')->where('date_of_payment', '=', $date)->sum('payment_amount');
            return view('pages/main', compact('totalPayment'));
        } else {
            return redirect('');
        }
    }

    public function view_add_disease()
    {
        $diseases = Disease::all();
        return view('pages/add_disease', compact('diseases'));
    }
    public function view_hospital()
    {
        $countRows = HospitalDetail::all()->count();
        // return $countRows;

        if ($countRows > 0) {
            $getHospitalDetails = HospitalDetail::all();
            return view('pages/hospital', compact('countRows', 'getHospitalDetails'));
        } else {
            return view('pages/hospital', compact('countRows'));
        }
    }

    public function view_add_medicine()
    {
        $medicines = Medicine::all();
        return view('pages/add_medicine', compact('medicines'));
    }

    public function view_add_prescription()
    {
        $medicines = Medicine::all();
        $diseases = Disease::all();
        $patients = Patient::all();
        // return $patients;
        // return $medicines;
        return view('pages/add_prescription', compact('medicines', 'diseases', 'patients'));
    }
    public function add_disease(Request $request)
    {
        // return $request->all();
        $disease = new Disease;
        $disease->disease_name = $request->disease_name;
        $query = $disease->save();
        if ($query) {
            return redirect('add_disease');
        }
    }


    public function add_medicine(Request $request)
    {
        // return $request->all();
        $medicine = new Medicine;
        $medicine->medicine_name = $request->medicine_name;
        $query = $medicine->save();
        if ($query) {
            return redirect('add_medicine');
        }
    }

    public function update_disease($id)
    {
        $diseases = DB::table('diseases')->where('id', '=', $id)->get();
        return view('pages/update_disease', compact('diseases'));
        // return $disease;
    }

    public function disease_update(Request $request, Disease $disease)
    {
        // return $request->all();
        DB::table('diseases')
            ->where('id', $request->id)
            ->update(['disease_name' => $request->disease_name]);
        // $disease->update([

        //     "disease_name" => $request->disease_name,

        // ]);
        return redirect('add_disease');
    }

    public function update_medicine($id)
    {
        $medicines = DB::table('medicines')->where('id', '=', $id)->get();
        return view('pages/update_medicine', compact('medicines'));
    }

    public function medicine_update(Request $request)
    {
        // return $request;
        DB::table('medicines')
            ->where('id', $request->id)
            ->update(['medicine_name' => $request->medicine_name]);
        return redirect('add_medicine');
    }

    public function delete_disease($id)
    {
        // return $id;
        $deleted_phase = Disease::find($id);
        $deleted_phase->delete();
        return redirect('add_disease');
    }

    public function delete_medicine($id)
    {
        // return $id;
        $deleted_phase = Medicine::find($id);
        $deleted_phase->delete();
        return redirect('add_medicine');
    }
    public function save_details(Request $request)
    {
        // return $request->all();

        $image = $request->file('hospital_logo');
        $my_image = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('logo'), $my_image);

        HospitalDetail::create([
            'hospital_name' => $request->hospital_name,
            'hospital_logo' => $my_image,
            'dr_name' => $request->dr_name,
            'qualification' => $request->qualification,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'contact_1' => $request->contact_1,
            'contact_2' => $request->contact_2,
            'timing_1' => $request->timing_1,
            'timing_2' => $request->timing_2,
            'email' => $request->email_id,
            'regd_no' => $request->regd_no,


        ]);
        return redirect('main')->with('success', 'Data Inserted Successfully');
    }


    public function save_prescription(Request $request)
    {
        $currentDate = date('Y-m-d');
        $patient = new Patient();
        $prescription = new Prescription();
        // return $request->all();


        // return $request->all();
        if ($request->patient_type == "new") {
            $patient->patient_name = $request->patient_name;
            $patient->patient_mobile = $request->patient_mobile;
            $patient->gender = $request->gender;
            $patient->age = $request->age;
            $patient->blood_group = $request->bld_grp;
            $execute_patient = $patient->save();
            $patient_id = DB::getPdo()->lastInsertId();
            // return $patient_id;
            // exit();
            if ($execute_patient) {
                $patient_id = DB::getPdo()->lastInsertId();
                $prescription->patient_id = $patient_id;
                $prescription->blood_pressure = $request->bld_pressure;
                $prescription->sugar = $request->sugar;
                $prescription->weight = $request->weight;
                $prescription->disease_name = $request->disease_name;
                $prescription->symptoms = $request->symptoms;
                $prescription->checkup_date = $currentDate;
                $prescription->patient_status = "1";
                $execute_prescription = $prescription->save();
                if ($execute_prescription) {
                    $prescription_id = DB::getPdo()->lastInsertId();
                    for ($i = 0; $i < count($request->medicine_name); $i++) {
                        $patient_medicine_detail = new PatientMedicineDetail();
                        $patient_medicine_detail->patient_id = $patient_id;
                        $patient_medicine_detail->prescription_id = $prescription_id;
                        $patient_medicine_detail->medicine_name = $request->medicine_name[$i];
                        $patient_medicine_detail->quantity = $request->quantity[$i];
                        $patient_medicine_detail->when_to_take = $request->when_to_take[$i];
                        $patient_medicine_detail->before_after = $request->before_after[$i];
                        $patient_medicine_detail->days = $request->days[$i];
                        $patient_medicine_detail->checkup_date = $currentDate;
                        $execute = $patient_medicine_detail->save();
                    }
                }
                if ($execute) {
                    return redirect()->to('payment/' . $patient_id);
                    // return $patient_id;
                }
            }
        } else {
            $prescription->patient_id = $request->patient_id;
            $prescription->blood_pressure = $request->bld_pressure;
            $prescription->sugar = $request->sugar;
            $prescription->weight = $request->weight;
            $prescription->disease_name = $request->disease_name;
            $prescription->symptoms = $request->symptoms;
            $prescription->checkup_date = $currentDate;
            $prescription->patient_status = "1";
            $execute_prescription = $prescription->save();
            if ($execute_prescription) {
                $prescription_id = DB::getPdo()->lastInsertId();
                for ($i = 0; $i < count($request->medicine_name); $i++) {
                    $patient_medicine_detail = new PatientMedicineDetail();
                    $patient_medicine_detail->patient_id = $request->patient_id;
                    $patient_medicine_detail->prescription_id = $prescription_id;
                    $patient_medicine_detail->medicine_name = $request->medicine_name[$i];
                    $patient_medicine_detail->quantity = $request->quantity[$i];
                    $patient_medicine_detail->when_to_take = $request->when_to_take[$i];
                    $patient_medicine_detail->before_after = $request->before_after[$i];
                    $patient_medicine_detail->days = $request->days[$i];
                    $patient_medicine_detail->checkup_date = $currentDate;
                    $execute = $patient_medicine_detail->save();
                }
            }
            if ($execute) {
                return redirect()->to('payment/' . $request->patient_id);
                // return $request->patient_id;
            }
        }
    }


    public function payment($patient_id)
    {

        $patient_details = Patient::where('id', '=', $patient_id)->first();
        // return $patient_details;
        return view('pages/payment', compact('patient_details'));
    }

    public function save_payment(Request $request)
    {
        $payment = new Payment();
        $payment->patient_id = $request->patient_id;
        $payment->patient_name = $request->patient_name;
        $payment->date_of_payment = $request->date_of_payment;
        $payment->payment_mode = $request->payment_mode;
        $payment->payment_amount = $request->payment_amount;
        $execute_payment = $payment->save();
        if ($execute_payment) {
            return redirect()->to('print_prescription/' . $request->patient_id);
        }
    }

    public function print_prescription($last_patient_id)
    {
        $currentDate = date('Y-m-d');

        $hospital_details = HospitalDetail::all();
        $get_patient_details = Patient::where('id', '=', $last_patient_id)->first();
        $get_patient_prescription = Prescription::where('patient_id', '=', $last_patient_id)->first();
        $get_medicine_details = PatientMedicineDetail::where('patient_id', '=', $last_patient_id)->where('checkup_date', '=',  $currentDate)->get();
        // return   $get_medicine_details;
        // return $hospital_details;


        return view('pages/prescription', compact('hospital_details', 'get_patient_details', 'get_patient_prescription', 'get_medicine_details'));
    }

    public function update_details(Request $request, $id)
    {
        $updateHospialDetial = HospitalDetail::find($id);
        // return $updateHospialDetial;
        // return $request->all();
        $updateHospialDetial->hospital_name = $request->hospital_name;
        $updateHospialDetial->dr_name = $request->dr_name;
        $updateHospialDetial->qualification = $request->qualification;
        $updateHospialDetial->address_1 = $request->address_1;
        $updateHospialDetial->address_2 = $request->address_2;
        $updateHospialDetial->contact_1 = $request->contact_1;
        $updateHospialDetial->contact_2 = $request->contact_2;
        $updateHospialDetial->timing_1 = $request->timing_1;
        $updateHospialDetial->timing_2 = $request->timing_2;
        $updateHospialDetial->email = $request->email_id;
        $updateHospialDetial->regd_no = $request->regd_no;

        if ($request->hasfile('hospital_logo')) {
            $file = $request->file('hospital_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('logo', $filename);
            $updateHospialDetial->hospital_logo = $filename;
        } else {
            $updateHospialDetial->hospital_logo = $request->old_logo;
        }
        $updateHospialDetial->save();
        return redirect('main')->with('update', 'Data Updated Successfully');
    }

    public function get_medical_history($patient_id)
    {
        // $patient_details = Patient::select('patient_mobile', 'gender', 'age', 'blood_group')->where('id', '=', $patient_id)->first();
        // return $patient_details;
        // $users = User::join('posts', 'posts.user_id', '=', 'users.id')
        //     ->join('comments', 'comments.post_id', '=', 'posts.id')
        //     ->get(['users.*', 'posts.descrption']);

        // $users = Patient::join('patient_medicine_details', 'patient_medicine_details.patient_id', '=', 'patients.id')
        //     ->join('prescriptions', 'prescriptions.patient_id', '=', 'patients.id')
        //     ->get(['patients.*', 'patient_medicine_details.medicine_name', 'prescriptions.disease_name'])->where('id', '=', $patient_id);

        $patientDetails = Patient::select('patient_mobile', 'gender', 'age', 'blood_group')->where('id', '=', $patient_id)->get();
        $getPatientMedicine = PatientMedicineDetail::select('medicine_name', 'days', 'quantity')->where('patient_id', '=', $patient_id)->get();
        $getPrescription = Prescription::select('blood_pressure', 'sugar', 'weight')->where('patient_id', '=', $patient_id)->get();
        $result = array_merge(array($patientDetails), array($getPrescription), array($getPatientMedicine));
        return $result;
    }






    public function search2()
    {
        return view('pages/search2');
    }




    public function autosearch(Request $request)
    {
        // check if ajax request is coming or not
        if ($request->ajax()) {
            // select country name from database
            if (empty($request->patient)) {
                $output = '';
            } else {
                $data = Patient::where('patient_name', 'LIKE', "%{$request->patient}%")
                    ->get();
                // declare an empty array for output
                $output = '';
                // if searched countries count is larager than zero
                if (count($data) > 0) {
                    // concatenate output to the array
                    $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                    // loop through the result array
                    foreach ($data as $row) {
                        // concatenate output to the array
                        $output .= '<li class="list-group-item"' . 'id=' . $row->id . ' >' . $row->patient_name . '</li>';
                    }
                    // end of output
                    $output .= '</ul>';
                } else {
                    // if there's no matching results according to the input
                    $output .= '<li class="list-group-item">' . 'No results' . '</li>';
                }
            }
            // return output result array
            return $output;
        }
    }
}
// SELECT patient_name,gender FROM patients JOIN patient_medicine_details ON patients.id=patient_medicine_details.patient_id WHERE patient_id=1
// select `patients`.*, `patient_medicine_details`.`medicine_name`, `prescriptions`.`sugar` from `patients` inner join `patient_medicine_details` on `patient_medicine_details`.`patient_id` = `patients`.`id` inner join `prescriptions` on `prescriptions`.`patient_id` = `patients`.`id` WHERE `patients`.`id`=1
