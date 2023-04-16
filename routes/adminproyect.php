<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryTopicController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTopicController;
use App\Http\Controllers\EnlaceController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

 /* LOGIN DEL ADMIN */
 Route::get('admin/login', function () {
    return view('login');
})->name('login');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

/* ADMIN WEB  - MANAGER */
Route::middleware('auth')->prefix('admin')->group(function () {



    /* PAGINA PRINCIPAL DEL ADMIN */
   /*  Route::get('home', function () {
        return view('adminapp.home');
    })->name('admin.home'); */

 

    /* CategoryController */
    Route::controller(CategoryController::class)->group(function () {
        /* START CATEGORY ROUTE */
        /* RUTAS PARA MÓDULO DE CATEGORÍA */
        Route::get('category', 'index')->name('category.course');
        Route::post('store', 'store')->name('store');
        Route::get('fetchall', 'fetchAll')->name('fetchAll');
        Route::get('loadcontent', 'loadContent')->name('load.content');
        Route::delete('delete', 'destroy')->name('delete');
        Route::post('update', 'update')->name('update');
        /* END CATEGORY ROUTE */
    });

    /* CategoryTopicController */
    Route::controller(CategoryTopicController::class)->group(function () {
        /* START CATEGORYTOPIC ROUTE */
        /* RUTAS PARA MÓDULO DE CATEGORÍA */
        Route::get('categorytopic', 'index')->name('categorytopic.course');
        Route::post('storetopic', 'store')->name('storetopic');
        Route::get('fetchalltopic', 'fetchAll')->name('fetchAlltopic');
        Route::get('loadcontenttopic', 'loadContent')->name('load.contenttopic');
        Route::delete('topic', 'destroy')->name('deletetopic');
        Route::post('updatetopic', 'update')->name('topic.update');
        /* END CATEGORY ROUTE */
    });

    /* CourseController */
    Route::controller(CourseController::class)->group(function () {
        /* START COURSES ROUTE */
        /* RUTAS PARA MÓDULO DE CURSOS */
        Route::get('course', 'index')->name('course');
        Route::post('course', 'store')->name('course.store');
        Route::get('fetchallcourse', 'fetchAll')->name('course.fetchAll');
        Route::get('loadcontentcourse', 'loadContent')->name('load.content.course');
        Route::delete('deletecourse', 'destroy')->name('course.delete');
        Route::post('updatecourse', 'update')->name('course.update');
        /* END COURSES ROUTE */
    });

    /* TopicController  */
    Route::controller(TopicController::class)->group(function () {
        /* START TOPICS ROUTE */
        /* RUTAS PARA MÓDULO DE TEMAS */
        Route::get('topic', 'index')->name('topic');
        Route::post('topic', 'store')->name('topic.store');
        Route::get('fetchall-topic', 'fetchAll')->name('topic.fetchAll');
        Route::get('load-content-topic', 'loadContent')->name('load.topic');
        Route::delete('delete-topic', 'destroy')->name('topic.deleted');
        Route::post('update-topic', 'update')->name('topic.updated');
        /* END TOPICS ROUTE */
    });

    /* CourseTopicController */
    Route::controller(CourseTopicController::class)->group(function () {
        /* START TOPICS-COURSE ROUTE */
        /* RUTAS PARA MÓDULO DE TEMAS */
        Route::get('topic-course/{id}', 'index')->name('topic-course.view');
        Route::get('course-search', 'searchCourse')->name('course-search');
        Route::get('course-topic-all', 'fetchAll')->name('courses-topic.fetchAll');
        Route::post('topic-store-course', 'store')->name('topic.store.course');
        Route::delete('delete-topic-course', 'destroy')->name('topic.course.deleted');
        /* END TOPICS-COURSE ROUTE */
    });

    /* EnlaceController */
    Route::controller(EnlaceController::class)->group(function () {
        /* STAR ENLACES ROUTE */
        /* RUTAS PARA MODULO DE ENLACES */
        Route::get('loadcontent-enlaces', 'index')->name('load.content.enlaces');
        Route::get('all-enlaces', 'fetchAll')->name('cargar.enlaces');
        Route::post('enlaces-store', 'store')->name('enlaces.store');
        /* END ENLACES ROUTE */

    });

    /* LinkController */
    Route::controller(LinkController::class)->group(function () {
        /* STAR ENLACES COURSES ROUTE */
        /* RUTAS PARA MODULO DE ENLACES COURSES*/
        Route::get('loadcontent-enlacess', 'index')->name('load.content.enlacess');
        Route::get('all-enlacess', 'fetchAll')->name('cargar.enlacess');
        Route::post('enlacess-store', 'store')->name('enlacess.store');
        /* END ENLACES COURSES ROUTE */

    });
});
