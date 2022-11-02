<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\PDFController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});
Route::get('/signin',[HomeController::class,'signin']);
Route::get('/signup',[HomeController::class,'signup']);
Route::get('/',[HomeController::class,'index']);
Route::get('/course',[HomeController::class,'course']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/contact',[HomeController::class,'contact']);
Route::get('/home',[HomeController::class,'redirect']);
Route::post('/upload_message',[Message::class,'upload_message_function']);
Route::post('/add-subscriber-email',[HomeController::class,'addSubscriber']);
Route::get('/more_about/{id}',[HomeController::class,'more_about']);

Route::get('/admin/level/add-level',[LevelController::class,'addLevel']);
Route::post('/upload_level',[LevelController::class,'saveLevel']);
Route::get('/admin/level/manage-level',[LevelController::class,'manageLevel']);
Route::get('/admin/level/edit-level/{id}',[LevelController::class,'editLevel']);
Route::post('/editlevel_form/{id}',[LevelController::class,'update']);
Route::get('/admin/delete-level/{id}',[LevelController::class,'delete']);

Route::get('/admin/country/add-country',[CountryController::class,'addCountry']);
Route::post('/upload_country',[CountryController::class,'saveCountry']);
Route::get('/admin/country/manage-country',[CountryController::class,'manageCountry']);
Route::get('/admin/country/edit-country/{id}',[CountryController::class,'editCountry']);
Route::post('/editcountry_form/{id}',[CountryController::class,'update']);
Route::get('/admin/delete-country/{id}',[CountryController::class,'delete']);


Route::get('/admin/category/add-category',[CourseCategoryController::class,'addCategory']);
Route::post('/upload_category',[CourseCategoryController::class,'saveCategory']);
Route::get('/admin/category/manage-category',[CourseCategoryController::class,'manageCategory']);
Route::get('/admin/category/edit-category/{id}',[CourseCategoryController::class,'editCategory']);
Route::post('/editcategory_form/{id}',[CourseCategoryController::class,'update']);
Route::get('/admin/delete-category/{id}',[CourseCategoryController::class,'delete']);


Route::get('/admin/about/add-about',[AboutUsController::class,'addAboutUs']);
Route::post('/upload_about_us',[AboutUsController::class,'saveAboutUs']);
Route::get('/admin/about/manage-about',[AboutUsController::class,'manageAboutUs']);


Route::get('/admin/profession/add-profession',[ProfessionController::class,'addProfession']);
Route::post('/upload_profession',[ProfessionController::class,'saveProfession']);
Route::get('/admin/profession/manage-profession',[ProfessionController::class,'manageProfession']);
Route::get('/admin/profession/edit-profession/{id}',[ProfessionController::class,'editProfession']);
Route::post('/editprofession_form/{id}',[ProfessionController::class,'update']);
Route::get('/admin/delete-profession/{id}',[ProfessionController::class,'delete']);


Route::get('/admin/tutor/add-tutor',[TutorController::class,'addTutor']);
Route::post('/upload_tutor',[TutorController::class,'saveTutor']);
Route::get('/admin/tutor/manage-tutor',[TutorController::class,'manageTutor']);
Route::get('/admin/tutor/edit-tutor/{id}',[TutorController::class,'editTutor']);
Route::post('/edittutor_form/{id}',[TutorController::class,'update']);
Route::get('/admin/delete-tutor/{id}',[TutorController::class,'delete']);

Route::get('/admin/tutorProfile/add-tutor-profile',[TutorProfileController::class,'addTutorProfile']);
Route::post('/upload_tutor_profile',[TutorProfileController::class,'saveTutorProfile']);
Route::get('/admin/tutorProfile/manage-tutor-profile',[TutorProfileController::class,'manageTutorProfile']);


Route::get('/admin/course/add-course',[CourseController::class,'addCourse']);
Route::post('/upload_course',[CourseController::class,'saveCourse']);
Route::get('/admin/course/manage-course',[CourseController::class,'manageCourse']);


Route::get('/admin/quiz/add-quiz',[QuizController::class,'addQuiz']);
Route::post('/upload_quiz',[QuizController::class,'saveQuiz']);
Route::get('/admin/quiz/manage-quiz',[QuizController::class,'manageQuiz']);


Route::get('/admin/video/add-video',[VideoController::class,'addVideo']);
Route::post('/upload_video',[VideoController::class,'saveVideo']);
Route::get('/admin/video/manage-video',[VideoController::class,'manageVideo']);

Route::post('/upload_comment',[CommentController::class,'saveComment']);
Route::post('/add_like',[LikeController::class,'saveLike']);

Route::get('/admin/team/add-team',[TeamController::class,'addTeam']);
Route::post('/upload_team',[TeamController::class,'saveTeam']);
Route::get('/admin/team/manage-team',[TeamController::class,'manageTeam']);
Route::get('/admin/edit-team/{id}',[TeamController::class,'editTeam']);
Route::post('/editteam_form/{id}',[TeamController::class,'update']);
Route::get('/admin/delete-team/{id}',[TeamController::class,'delete']);

Route::get('/admin/blog/add-blog-info',[BlogController::class,'addBlog']);
Route::post('/upload_blog',[BlogController::class,'saveBlog']);
Route::get('/admin/blog/manage-blog-info',[BlogController::class,'manageBlog']);
Route::get('/admin/edit-blog-info/{id}',[BlogController::class,'editBlog']);
Route::post('/editblog_form/{id}',[BlogController::class,'update']);
Route::get('/admin/delete-blog/{id}',[BlogController::class,'delete']);

Route::get('/admin/student/add-student',[studentController::class,'addStudent']);
Route::post('/upload_student',[studentController::class,'saveStudent']);
Route::get('/admin/student/manage-student',[studentController::class,'manageStudent']);
Route::get('/admin/edit-student/{id}',[studentController::class,'editStudent']);
Route::post('/editstudent_form/{id}',[studentController::class,'update']);
Route::get('/admin/delete-student/{id}',[studentController::class,'delete']);


Route::get('/showteam',[AdminController::class,'showteam']);
Route::get('/showadmission',[AdminController::class,'showadmission']);
Route::get('/accept/{id}',[AdminController::class,'accept']);
Route::get('/edit/{id}',[AdminController::class,'edit']);
Route::get('/decline/{id}',[AdminController::class,'decline']);
Route::get('/delete/{id}',[AdminController::class,'delete']);

Route::get('/individual_student',[AdminController::class,'individual_student_report']);
Route::get('/general_report',[AdminController::class,'general_report']);
Route::post('/retrieve_data',[AdminController::class,'individual_student_report']);
Route::get('/message_view',[AdminController::class,'message_view_fun']);
Route::get('/list_feedback_view',[AdminController::class,'feedback_view']);
Route::get('/publish/{id}',[AdminController::class,'publish_fun']);
Route::get('/decline_feed/{id}',[AdminController::class,'decline_fun']);
Route::get('/add_faq_view',[AdminController::class,'add_faq_view']);

Route::get('/user_activity',[AdminController::class,'activityLogs']);


Route::get('/student/admission/fill-admission-form',[studentController::class,'fillAdmissionForm']);
Route::get('/student/tutor/tutors',[studentController::class,'tutor']);
Route::get('/student/tutor/profile',[studentController::class,'tutorProfile']);
Route::post('/upload_student',[studentController::class,'saveStudent']);
Route::get('/student/profile',[studentController::class,'profile']);
Route::get('/student/course/showcourse',[studentController::class,'showcourses']);
Route::get('/student/view_playlist',[studentController::class,'playlist']);
Route::post('/upload_feedback',[studentController::class,'upload_feed']);
Route::get('/student/tutor/profile/{id}',[studentController::class,'viewProfile']);
Route::get('/student/video/playlist/{id}',[studentController::class,'viewPlaylist']);
Route::get('/student/video/watch-video/{id}',[studentController::class,'watchVideo']);
Route::get('/student/quiz/attempt-quiz/{id}',[studentController::class,'attemptQuiz']);

Route::get('/student/cart/cart',[CartController::class,'cart']);
Route::post('/upload_cart',[CartController::class,'saveCart']);
Route::get('/student/payment/payment',[PaymentController::class,'createPayment']);
Route::get('/student/delete-cart/{id}',[CartController::class,'deleteCartItem']);

Route::get('/student/testimonial/add-testimonial',[TestimonialController::class,'addTestimonial']);
Route::post('/upload_testimonial',[TestimonialController::class,'savetestimonial']);
Route::get('/admin/testimonial/manage-testimonial',[TestimonialController::class,'manageTestimonial']);
Route::get('/admin/approve-testimonial/{id}',[TestimonialController::class,'approve']);
Route::get('/admin/delete-testimonial/{id}',[TestimonialController::class,'delete']);

Route::get('/generate-pdf', [AdminController::class, 'generatePDF']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
