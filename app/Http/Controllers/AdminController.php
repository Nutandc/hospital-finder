<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Guardian;
use App\Level;
use App\Routine;
use App\Schedule;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $sum = Student::all()->sum('duefee');
        $totalcount = User::all()->count();
        $studentcount = Student::all()->count();
        $teachercount = Teacher::all()->count();
        $parentcount = Guardian::all()->count();
        return view('admin/aindex', compact('sum', 'studentcount', 'totalcount', 'teachercount', 'parentcount'));
    }
    public function teacherPage()
    {
        $users = User::where('role', 'LIKE', '4')->get();
        $teachers = Teacher::all();
        return view('admin/rolepages/teacherpage', compact('users', 'teachers'));
    }
    public function studentPage()
    {
        $users = User::where('role', 'LIKE', '3')->get();
        $students = Student::all();
        return view('admin/rolepages/studentpage', compact('users', 'students'));
    }
    public function parentPage()
    {
        $users = User::where('role', 'LIKE', '5')->get();
        return view('admin/rolepages/parentpage')->with('users', $users);
    }
    public function accountantPage()
    {
        $users = User::where('role', 'LIKE', '7')->get();
        return view('admin/rolepages/accountantpage')->with('users', $users);
    }
    public function librarianPage()
    {
        $users = User::where('role', 'LIKE', '6')->get();
        return view('admin/rolepages/librarianpage')->with('users', $users);
    }
    public function addTeacherPage()
    {
        $subjects = Subject::all();
        return view('admin/addroles/addnewteacher', compact('subjects'));
    }
    public function addStudentPage()
    {
        $levels = Level::all();
        return view('admin/addroles/addnewstudent', compact('levels'));
    }
    public function addParentPage()
    {
        $students = User::where('role', 'LIKE', '3')->get();
        return view('admin/addroles/addnewparent', compact('students'));
    }
    public function addAccountantPage()
    {
        return view('admin/addroles/addnewaccountant');
    }
    public function addLibrarianPage()
    {
        return view('admin/addroles/addnewlibrarian');
    }
    public function addTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'salary' => 'required|max:8|min:4',
            'joindate' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '4',
            'password' => bcrypt($request->password),
        ]);
        Teacher::create([
            'salary' => $request->salary,
            'address' => $request->address,
            'joindate' => $request->joindate,
            'duesalary' => '0',
            'id' => $user->id,
        ]);
        return redirect('/teacher-page')->with('status', 'Teacher created successfully');
    }
    public function addStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'class' => 'required|max:20',
            'address' => 'required|max:255',
            'mothername' => 'required|max:255',
            'fathername' => 'required|max:255',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '3',
            'password' => bcrypt($request->password),
        ]);
        Student::create([
            'class' => $request->class,
            'roll' => $request->roll,
            'address' => $request->address,
            'fathername' => $request->fathername,
            'mothername' => $request->mothername,
            'duefee' => $request->duefee,
            'id' => $user->id,
        ]);
        return redirect('/student-page')->with('status', 'Student created successfully');
    }
    public function addParent(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'studentid' => 'required|max:100|min:8',
            'occupation' => 'required|max:100|min:8',
            
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '5',
            'password' => bcrypt($request->password),
        ]);
        Guardian::create([
            'studentid' => $request->studentid,
            'occupation' => $request->occupation,
            'id' => $user->id,
        ]);
        return redirect('/parent-page')->with('status', 'Parent created successfully');
    }
    public function addAccountant(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '6',
            'password' => bcrypt($request->password),
        ]);
        return redirect('/accountant-page')->with('status', 'Accountant created successfully');
    }
    public function addLibrarian(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => '5',
            'password' => bcrypt($request->password),
        ]);
        return redirect('/librarian-page')->with('status', 'Librarian created successfully');
    }
    public function editTeacherPage(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $teachers = Teacher::findOrFail($id);
        $subjects = Subject::all();
        return view('admin.editroles.editteacher', compact('users', 'teachers', 'subjects'));
    }
    public function editStudentPage(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $students = Student::findOrFail($id);
        $levels = Level::all();
        return view('admin.editroles.editstudent', compact('users', 'students', 'levels'));
    }
    public function editParentPage(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $guardians = Guardian::findOrFail($id);
        return view('admin.editroles.editparent', compact('users', 'guardians'));
    }
    public function editAccountantPage(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.editroles.editaccountant')->with('users', $users);
    }
    public function editLibrarianPage(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.editroles.editlibrarian')->with('users', $users);
    }
    public function updateTeacher(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255|email',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'salary' => 'required|max:8|min:4',
            'joindate' => 'required',
        ]);
        $users = User::find($id);
        $teachers = Teacher::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        $teachers->salary = $request->input('salary');
        $teachers->address = $request->input('address');
        $teachers->duesalary = $request->input('duesalary');
        $teachers->update();
        return redirect('/teacher-page')->with('status', 'Your data is updated');
    }
    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'class' => 'required|max:20',
            'address' => 'required|max:255',
            'mothername' => 'required|max:255',
            'fathername' => 'required|max:255',
        ]);
        $users = User::find($id);
        $students = Student::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        $students->class = $request->input('class');
        $students->roll = $request->input('roll');
        $students->address = $request->input('address');
        $students->duefee = $request->input('duefee');
        $students->update();
        return redirect('/student-page')->with('status', 'Your data is updated');
    }
    public function updateAccountant(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        return redirect('/accountant-page')->with('status', 'Your data is updated');
    }
    public function updateLibrarian(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        return redirect('/librarian-page')->with('status', 'Your data is updated');
    }
    public function updateParent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|max:10|min:10',
            'password' => 'required|max:100|min:8',
            'studentid' => 'required|max:100|min:8',
            'occupation' => 'required|max:100|min:8',
            
        ]);
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->phone = $request->input('phone');
        $users->update();
        return redirect('/parent-page')->with('status', 'Your data is updated');
    }
    public function deleteTeacher(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/teacher-page')->with('status', 'Your data is deleted successfully');
    }
    public function deleteStudent(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $student = Student::findOrFail($id);
        $users->delete();
        $student->delete();
        return redirect('/student-page')->with('status', 'Your data is deleted successfully');
    }
    public function deleteParent(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/parent-page')->with('status', 'Your data is deleted successfully');
    }
    public function deleteAccountant(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/accountant-page')->with('status', 'Your data is deleted successfully');
    }
    public function deleteLibrarian(Request $request, $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('/librarian-page')->with('status', 'Your data is deleted successfully');
    }

    //Subjects
    public function subjectPage()
    {
        $subjects = Subject::all();
        $levels = Level::all();
        return view('admin/subject/subjectpage', compact('subjects', 'levels'));
    }

    public function addSubject(Request $request)
    {
        Subject::create([
            'class' => $request->class,
            'name' => $request->name,
        ]);
        return redirect('/subject-page')->with('status', 'Subject added successfully');
    }
    public function deleteSubject(Request $request, $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('/subject-page')->with('status', 'Subject deleted successfully');
    }

    //Class
    public function levelPage()
    {
        $levels = Level::all();
        return view('admin/level/levelpage', compact('levels'));
    }

    public function addLevel(Request $request)
    {
        Level::create([
            'fee' => $request->fee,
            'name' => $request->name,
        ]);
        return redirect('/level-page')->with('status', 'Class added successfully');
    }
    public function deleteLevel(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        return redirect('/level-page')->with('status', 'Class deleted successfully');
    }
    //Schedule
    public function schedulePage()
    {
        $schedules = Schedule::orderBy('starttime','asc')->get();
        $levels = Level::all();
        return view('admin/schedule/schedulepage', compact('schedules', 'levels'));
    }
    public function addSchedule(Request $request)
    {
        $request->validate([
            'starttime' => 'required|unique:schedules',
            'endtime' => 'required|unique:schedules',
        ]);
        Schedule::create([
            'starttime' => $request->starttime,
            'endtime' => $request->endtime,
        ]);
        return redirect('/schedule-page')->with('status', 'Timing added successfully');
    }
    public function deleteSchedule(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect('/schedule-page')->with('status', 'Timing deleted successfully');
    }

    //accounts 
    public function accountStudentPage()
    {
        $users = User::where('role', 'LIKE', '3')->get();
        $students = Student::all();
        $levels = Level::all();
        return view('admin\account\studentpage', compact('users', 'students', 'levels'));
    }
    public function accountStudentClassPage(Request $request)
    {
        $search = $_GET['class'];
        $students = Student::where('class', 'LIKE', '%'.$search.'%')->get();
        $userid = $students->id;
        $users = User::where('role', 'LIKE', '3')->where('id', 'LIKE', $userid)->get();
        $levels = Level::all();
        return view('admin\account\studentpage', compact('users', 'students', 'levels'));
        echo $students;
    }
    public function addFeePage()
    {
        $fees = Fee::all();
        $levels = Level::all();
        return view('admin\account\addfeepage', compact('fees', 'levels'));
    }
    public function addFee(Request $request)
    {
        $request->validate([
            'class' => 'required|max:255',
            'chargename' => 'required|max:255',
            'feeamount' => 'required',
        ]);
        $level = $request->class;
        $feeamount = $request->feeamount;
        DB::table('students')->where('class', $level)->increment('duefee', $feeamount);
        Fee::create([
            'class' => $level,
            'chargename' => $request->chargename,
            'feeamount' => $feeamount,
        ]);
        return redirect('/add-fee-page')->with('status', 'Fee added successfully');
    }
    public function addFeeDelete(Request $request, $id)
    {
        $students = Fee::find($id);
        $students->rollback = 1;
        $students->update();

        $feededucted = $students->feeamount;
        $feedeductlevel = $students->class;
        DB::table('students')->where('class', $feedeductlevel)->decrement('duefee', $feededucted);
        return redirect('/add-fee-page')->with('status', 'Fee removed successfully');
    }

    //Routine
    public function routine()
    {
        $schedules = Schedule::orderBy('starttime','asc')->get();
        $levels = Level::all();
        $routines = Routine::all();
        $teachers = User::where('role', 'LIKE', '4')->get();
        return view('admin/routine/routinepage', compact('schedules', 'levels', 'teachers', 'routines'));
    }
    public function addRoutine(Request $request)
    {
        $request->validate([
            'link' => 'required',
            // 'day' => 'required',
            'class' => 'required',
            'teacher' => 'required',
            'timingid' => 'required|unique:routines',
        ]);
        Routine::create([
            'link' => $request->link,
            'teacher' => $request->teacher,
            'day' => 3,
            'class' => $request->class,
            'timingid' => $request->timingid,
        ]);
        return redirect('/routinepage')->with('status', 'Lecture added successfully');
    }

}
