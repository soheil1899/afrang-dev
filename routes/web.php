<?php

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

Route::get('/','Auth\OtherUserController@logout')->name('logout');

Auth::routes();

Route::prefix('/')->namespace('Website')->group(function () {
    Route::get('/','PagesController@index')->name('indexpage');
    Route::get('/ourteam','PagesController@programmerteam')->name('programmer.team');
    Route::get('/contactus','PagesController@contactus')->name('contact.us');

});
Route::prefix('userpanel')->middleware('UserCheck')->group(function () {
    Route::get('/','User\UserController@homepage')->name('homepageuser');
    Route::get('/credit','User\UserController@credit')->name('credit');
    Route::get('/addCredit','User\UserController@addCredit')->name('addCredit');
});
Route::prefix('checkmobile')->middleware('AuthCheck')->group(function () {
    Route::get('/','User\UserController@checkmobile')->name('checkmobile');

});
Route::prefix('admin')->middleware('AdminCheck')->group(function () {
    Route::get('/','Admin\AdminController@homepage')->name('homepage');
    Route::get('/about','Admin\AdminController@about')->name('about');
    Route::get('/ArticleCategory','Admin\ArticleController@category')->name('ArticleCategory');
    Route::get('/ArticleCategory/NewCategory','Admin\ArticleController@CategoryEdit')->name('NewCategory');
    Route::get('/ArticleCategory/EditArticle/{id}','Admin\ArticleController@CategoryEdit')->name('EditArticleCategory');
    Route::get('/ArticleCategory/EditArticleCategory/{id}','Admin\ArticleController@CategoryEdit')->name('EditArticleCategory');
    Route::post('/ArticleCategory/SaveCategory','Admin\ArticleController@SaveCategory')->name('SaveCategory');
    Route::post('/ArticleCategory/LoadGroupList','Admin\ArticleController@LoadGroupList')->name('LoadGroupList');
    Route::post('/ArticleCategory/ChangeOrderGroup','Admin\ArticleController@ChangeOrderGroup')->name('ChangeOrderGroup');
    Route::post('/ArticleCategory/ChangePublishGroup','Admin\ArticleController@ChangePublishGroup')->name('ChangePublishGroup');
    Route::post('/ArticleCategory/LoadCategroyData','Admin\ArticleController@LoadCategroyData')->name('LoadCategroyData');
    Route::post('/ArticleCategory/DelGroupArticle','Admin\ArticleController@DelGroupArticle')->name('DelGroupArticle');
    Route::get('/Article/NewArtilce','Admin\ArticleController@NewArtilce')->name('NewArtilce');
    Route::post('/Article/SaveNewArticle','Admin\ArticleController@SaveNewArticle')->name('SaveNewArticle');
    Route::get('/Article/ArticleList','Admin\ArticleController@ArticleList')->name('articlelist');
    Route::post('/Article/ListArticle','Admin\ArticleController@ListArticle')->name('ListArticle');
    Route::post('/Article/LoadArticleData','Admin\ArticleController@LoadArticleData')->name('LoadArticleData');
    Route::post('/Article/LoadModule','Admin\ArticleController@LoadModule')->name('LoadModule');
    Route::post('/Article/LoadContentEditor','Admin\ArticleController@LoadContentEditor')->name('LoadContentEditor');
    Route::post('/Article/SaveSection','Admin\ArticleController@SaveSection')->name('SaveSection');
    Route::post('/Article/DelContent','Admin\ArticleController@DelContent')->name('DelContent');
    Route::get('/EditArticle/{id}','Admin\ArticleController@EditArticle')->name('EditArticle');
    Route::post('/Article/EditSection','Admin\ArticleController@EditSection')->name('EditSection');
    Route::post('/Article/RemoveArticle','Admin\ArticleController@RemoveArticle')->name('RemoveArticle');
    Route::post('/Article/ChangeOrderSection','Admin\ArticleController@ChangeOrderSection')->name('ChangeOrderSection');
    Route::post('/smsdetail','SendSms@Getinfo')->name('GetinfoSMS');

    // User
    Route::post('/LoadprofileInformation','Admin\AdminController@LoadprofileInformation')->name('LoadprofileInformation');
    Route::post('/LoadprofileInformations','Admin\AdminController@LoadprofileInformations')->name('LoadprofileInformations');
    Route::post('/Saveprofileedit','Admin\AdminController@Saveprofileedit')->name('Saveprofileedit');
    Route::post('/Savepassword','Admin\AdminController@Savepassword')->name('Savepassword');
    Route::get('/changepassword','Admin\AdminController@changepassword')->name('changepassword');
    /* Menu Manager */
    Route::get('/MenuGroup','Admin\MenuController@MenuGroup')->name('MenuGroup');
    Route::post('/SaveMenuGroup','Admin\MenuController@SaveMenuGroup')->name('SaveMenuGroup');
    Route::post('/getMenuGroup','Admin\MenuController@getMenuGroup')->name('getMenuGroup');
    Route::post('/LoadMenuGroup','Admin\MenuController@LoadMenuGroup')->name('LoadMenuGroup');
    Route::post('/DeleteMenuGroup','Admin\MenuController@DeleteMenuGroup')->name('DeleteMenuGroup');
    Route::get('/MenuGroup/{id}','Admin\MenuController@Menus')->name('Menus');
    Route::post('/Savemenu','Admin\MenuController@Savemenu')->name('Savemenu');
    Route::post('/LoadSubMenu','Admin\MenuController@LoadSubMenu')->name('LoadSubMenu');
    Route::post('/EditSubMenu','Admin\MenuController@EditSubMenu')->name('EditSubMenu');
    Route::post('/DeleteSubMenu','Admin\MenuController@DeleteSubMenu')->name('DeleteSubMenu');
    Route::post('/DeleteImage','Admin\MenuController@DeleteImage')->name('DeleteImage');

    /* End Menu Manager */
    // File Manager
    Route::post('/FileManager/UploadFile','Admin\FileManagerController@UploadFile')->name('UploadFile');
    Route::post('/FileManager/listFile','Admin\FileManagerController@ListFile')->name('listFile');
    Route::post('/FileManager/Delitem','Admin\FileManagerController@Delitem')->name('Delitem');

    // Setting
    Route::get('/setting','Admin\SettingController@Settingpage')->name('setting');
    Route::post('/setting','Admin\SettingController@LoadSettingpage')->name('LoadSettingpage');
    Route::post('/SaveSetting','Admin\SettingController@SaveSetting')->name('SaveSetting');
    Route::post('/Savelogo','Admin\SettingController@Savelogo')->name('Savelogo');
    Route::post('/SaveFav','Admin\SettingController@SaveFav')->name('SaveFav');
    Route::get('/profile','Admin\SettingController@profile')->name('profile');
    Route::get('/Firstpagesetting','Admin\SettingController@Firtpagesetting')->name('Firstpagesetting');
    Route::post('/SaveFirstpage','Admin\SettingController@SaveFirstPage')->name('SaveFirstPage');
    Route::post('/Savepicfirstpage','Admin\SettingController@Savepicfirstpage')->name('Savepicfirstpage');
    Route::post('/LoadSpecialPage','Admin\SettingController@LoadSpecialPage')->name('LoadSpecialPage');

    // Menu Group
  //  Route::get('/MenuGroup','AdVideoCentermin\Slider@MenuGroup')->name('SliderGroup');
    //Plugin Slider
    Route::get('/SliderGroup','Admin\Slider@SliderGroup')->name('SliderGroup');
    Route::post('/SlideGroupSave','Admin\Slider@SlideGroupSave')->name('SlideGroupSave');
    Route::post('/LoadSliderGroup','Admin\Slider@LoadSlider')->name('LoadSlider');
    Route::post('/LoadSliderGroupInfo','Admin\Slider@LoadSliderGroupInfo')->name('LoadSliderGroupInfo');
    Route::post('/AddToSlider','Admin\Slider@AddToSlider')->name('AddToSlider');
    Route::post('/LoadSliders','Admin\Slider@LoadSliders')->name('LoadSliders');
    Route::post('/SaveOptionsSliders','Admin\Slider@SaveOptionsSliders')->name('SaveOptionsSliders');
    Route::post('/DelSlider','Admin\Slider@DelSlider')->name('DelSlider');
    Route::post('/DelGroupSlider','Admin\Slider@DelGroupSlider')->name('DelGroupSlider');
        // Video Center
    Route::prefix('VideoCenter')->group(function () {
        Route::get('/','Admin\Video\VideoCenterController@dashboard')->name('dashboardvideo');
        Route::get('/uploadnewvideo','Admin\Video\VideoCenterController@newvideouplaoder')->name('newvideouplaoder');
        Route::get('/videolist','Admin\Video\VideoCenterController@videolist')->name('videolist');
        Route::post('/uploadvideofile','Admin\Video\VideoCenterController@uploadvideofile')->name('uploadvideofile');
        Route::post('/LoadVideoFile','Admin\Video\VideoCenterController@LoadVideoFile')->name('LoadVideoFile');
        Route::post('/RenameVideoFile','Admin\Video\VideoCenterController@RenameVideoFile')->name('RenameVideoFile');
        Route::get('/videoconvertor','Admin\Video\VideoCenterController@videoconvertor')->name('videoconvertor');
        Route::post('/listfile','Admin\Video\VideoCenterController@listfile')->name('listfile');
        Route::post('/listfileseraw','Admin\Video\VideoCenterController@listfileseraw')->name('listfileseraw');
        Route::post('/Convertor','Admin\Video\VideoCenterController@Convertor')->name('Convertor');
        Route::post('/playvideosection','Admin\Video\VideoCenterController@playvideosection')->name('playvideosection');
        Route::get('/play/{id}/{namefile}','Admin\Video\VideoCenterController@playvideo')->name('playvideo');
        Route::get('/getWatch/{id}/{section}','Admin\Video\VideoCenterController@getWatch')->name('getWatch');

        /* professors */

        /* Packages */
        Route::get('/Packages','Admin\Learning\PackagesController@index')->name('index');
        Route::post('/LoadPackage','Admin\Learning\PackagesController@loadpackage')->name('loadpackage');
        Route::post('/SavePackage','Admin\Learning\PackagesController@SavePackage')->name('SavePackage');
        Route::post('/loadpacklist','Admin\Learning\PackagesController@loadpacklist')->name('loadpacklist');
        Route::post('/UploadPicPackage','Admin\Learning\PackagesController@UploadPicPackage')->name('UploadPicPackage');

        /* End Packages */
        /* Packages */
        Route::get('/Major','Admin\Learning\MajorController@index')->name('indexMajor');
        Route::post('/LoadMajor','Admin\Learning\MajorController@loadMajor')->name('loadMajor');
        Route::post('/SaveMajor','Admin\Learning\MajorControlleClassr@SaveMajor')->name('SaveMajorage');
        Route::post('/Majorlist','Admin\Learning\MajorController@loadMajorlist')->name('loadMajorlist');
        Route::post('/UploadPicMajor','Admin\Learning\MajorController@UploadPicMajor')->name('UploadPicMajor');

        /* End Packages */
        /* Start professors */

        Route::get('/professors','Admin\Professors\ProfessorsController@index')->name('indexProfessors');
        Route::post('/SavePorfessor','Admin\Professors\ProfessorsController@SavePorfessor')->name('SavePorfessor');
        Route::post('/loadproflist','Admin\Professors\ProfessorsController@loadproflist')->name('loadproflist');
        Route::post('/LoadPorfessor','Admin\Professors\ProfessorsController@LoadPorfessor')->name('LoadPorfessor');
        Route::post('/UploadProf','Admin\Professors\ProfessorsController@UploadProf')->name('UploadProf');

        /* End professors */
        Route::get('/Classroom','Admin\Learning\ClassroomController@index')->name('indexclassroom');
        Route::get('/offlineClassroom','Admin\Learning\ClassroomController@indexoffiline')->name('indexoffiline');
        Route::get('/Class','Admin\Learning\ClassroomController@Classnew')->name('Class');
        Route::get('/Classedit','Admin\Learning\ClassroomController@Classedit')->name('Classedit');
        Route::get('/Classedit/{id}','Admin\Learning\ClassroomController@Classedit')->name('Classedit');
        Route::get('/Class/{id}','Admin\Learning\ClassroomController@Classnew')->name('Class');
        Route::get('/Lessons/{id}','Admin\Learning\ClassroomController@Lessons')->name('Lessons');
        Route::get('/LessonsOffline/{id}','Admin\Learning\ClassroomController@LessonsOffline')->name('LessonsOffline');
        Route::post('/SaveLesson','Admin\Learning\ClassroomController@SaveLesson')->name('Lessons');
        Route::post('/SaveLessonoffline','Admin\Learning\ClassroomController@SaveLessonoffline')->name('SaveLessonoffline');
        Route::post('/SaveClass','Admin\Learning\ClassroomController@SaveClass')->name('SaveClass');
        Route::post('/SaveClassFree','Admin\Learning\ClassroomController@SaveClassFree')->name('SaveClass');
        Route::post('/SaveClasspic','Admin\Learning\ClassroomController@SaveClasspic')->name('SaveClasspic');
        Route::post('/SaveClasspicFree','Admin\Learning\ClassroomController@SaveClasspicFree')->name('SaveClasspicFree');
        Route::post('/loadclass','Admin\Learning\ClassroomController@loadclass')->name('loadclass');
        Route::post('/loadclassfree','Admin\Learning\ClassroomController@loadclassfree')->name('loadclassfree');
        Route::post('/loadclassroom','Admin\Learning\ClassroomController@loadclassroom')->name('loadclassroom');
        Route::post('/loadclassroomoffline','Admin\Learning\ClassroomController@loadclassroomfree')->name('loadclassroomfree');
        Route::post('/loadclassroomoffline','Admin\Learning\ClassroomController@loadclassroomfree')->name('loadclassroomfree');
        Route::post('/VideoLoadFile','Admin\Learning\ClassroomController@VideoLoadFile')->name('VideoLoadFile');
        Route::post('/EditLesson','Admin\Learning\ClassroomController@EditLesson')->name('loadclassroom');
        /* Online Setting */
        Route::get('/settingonline','Admin\Learning\ClassroomController@settingonline')->name('settingonline');
        Route::post('/SaveSetting','Admin\Learning\ClassroomController@SaveSetting')->name('SaveSetting');
        Route::post('/CheckUrl','Admin\Learning\ClassroomController@CheckUrl')->name('CheckUrl');
        Route::post('/CreateRoom','Admin\Learning\ClassroomController@CreateRoom')->name('CreateRoom');
        Route::post('/LoginAdminUser','Admin\Learning\ClassroomController@LoginAdminUser')->name('LoginAdminUser');

        /* End Online Setting */
        /* Start Classroom */
        Route::post('/loadsetting','Admin\Learning\ClassroomController@loadsetting')->name('VideoLoadFile');

        /* End Classroom */


        Route::get('{filename}', 'Admin\Video\VideoCenterController@getWatch');
        Route::get('/master/{filename}', 'Admin\Video\VideoCenterController@getWatchmaster');
        Route::get('/master/{filename}', 'Admin\Video\VideoCenterController@getWatchmaster');


    });
    Route::prefix('news')->group(function () {
        Route::resource('users', 'Admin\News\UserNewsControlller');
        Route::post('subject/up', 'Admin\News\SubjectControlller@up');
        Route::post('subject/down', 'Admin\News\SubjectControlller@down');
        Route::resource('subject', 'Admin\News\SubjectControlller');
        Route::resource('layout', 'Admin\News\LayoutControlller');
        Route::resource('users', 'Admin\News\UsersNewsController');
    });
    Route::prefix('adv')->group(function () {
        Route::resource('customers', 'Admin\Adv\AdvCustomerControlller');
        Route::resource('advers', 'Admin\Adv\AdvAdverControlller');
        Route::resource('layouts', 'Admin\Adv\AdvLayoutControlller');
    });

    // End Video
        //Market  Manager */
    /* Start Discount */

    /* End Discount */

});
