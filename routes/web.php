<?php

Route::get(
    'health',
    'HealthController@index'
)->name('health');

Route::get(
    '/',
    'ProductController@index'
)->name('home');

Route::post(
// 로그아웃은 Customer 것을 공용으로 사용합니다.
// 로그아웃 메서드는 전체 세션을 전부 삭제하기 때문입니다.
// @see Illuminate\Foundation\Auth\AuthenticatesUsers::logout
    'logout',
    'Auth\LoginController@logout'
)->name('logout');

// 비밀번호 초기화도 공용으로 사용합니다.
// Member는 백오피스에서만 계정 생성/수정하는 것이 일반적이기 때문입니다.
Route::get(
    'password/reset',
    'Auth\ForgotPasswordController@showLinkRequestForm'
)->name('password.request');
Route::post(
    'password/email',
    'Auth\ForgotPasswordController@sendResetLinkEmail'
)->name('password.email');
Route::get(
    'password/reset/{token}',
    'Auth\ResetPasswordController@showResetForm'
)->name('password.reset');
Route::post(
    'password/reset',
    'Auth\ResetPasswordController@reset'
)->name('password.reset.submit');

Route::prefix('customers')->group(function () {
    Route::get(
        '/',
        'CustomerController@dashboard'
    )->name('customers.dashboard');
    Route::get(
        'login',
        'Auth\Customer\LoginController@showLoginForm'
    )->name('customers.login');
    Route::post(
        'login',
        'Auth\Customer\LoginController@login'
    )->name('customers.login.submit');
    Route::get(
        'register',
        'Auth\Customer\RegisterController@showRegistrationForm'
    )->name('customers.register');
    Route::post(
        'register',
        'Auth\Customer\RegisterController@register'
    )->name('customers.register.submit');
    Route::get(
        'social/{provider}',
        'Auth\Customer\SocialController@execute'
    )->name('customers.social.login');

    Route::resource(
        'carts',
        'Customer\CartController',
        ['only' => ['index', 'store', 'edit', 'destroy']]
    );
    Route::delete(
        'carts/reset',
        'Customer\CartController@reset'
    );
    Route::any('carts/checkout', function () {
        return response()->json([
            'payment_method' => App\PaymentMethod::getInstance('CARD')
        ], 201);
    })->name('carts.checkout');
    Route::resource(
        'orders',
        'Customer\OrderController',
        [
            'only' => ['index', 'store', 'update', 'destroy'],
            'names' => [
                'index' => 'customers.orders.index',
                'store' => 'customers.orders.store',
                'update' => 'customers.orders.update',
                'destroy' => 'customers.orders.destroy',
            ]
        ]
    );
});

Route::prefix('members')->group(function () {
    Route::get(
        '/',
        'MemberController@dashboard'
    )->name('members.dashboard');
    Route::get(
        'login',
        'Auth\Member\LoginController@showLoginForm'
    )->name('members.login');
    Route::post(
        'login',
        'Auth\Member\LoginController@login'
    )->name('members.login.submit');

    // Member 등록이나 비밀번호 초기화는 보통 관리자만 접근할 수 있는 백오피스에서 합니다.
  
    Route::resource(
        'products',
        'Member\ProductController',
        ['except' => ['index', 'show']]
    );
    Route::get(
        'orders',
        'Member\OrderController@index'
    )->name('members.orders.index');
});

Route::get(
    'products',
    'ProductController@index'
)->name('products.index');
Route::get(
    'products/{product}',
    'ProductController@show'
)->name('products.show');
Route::post(
    'products/images',
    'ImageController@store'
)->name('products.images.store');


//글쓰기 폼
Route::get('/article', 'ArticleController@create')->name('article.create');
//새로운글 저장
Route::post('/article', 'ArticleController@store')->name('article.store');
// 유니폼 리스트 페이지
Route::get('/article/list', 'ArticleController@list')->name('article.list');
//인덱스 리스트
Route::get('/article/index', 'ArticleController@index')->name('article.index');
//해당글 상세보기 
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
//해당글 수정 폼
Route::get('/article/edit', 'ArticleController@edit')->name('article.edit');
//해당글 업데이트
Route::put('/article/{id}', 'ArticleController@update')->name('article.update');
//해당글 삭제
Route::delete('/article/{id}/destroy', 'ArticleController@destroy')->name('article.destroy');



//관리자 수주관리 페이지
Route::get('/admin/index', 'AdminController@index')->name('admin.index');
//관리자 수주관리 페이지 데이터 가져오기 테스트(유저 데이터) => 나중에 주문 데이터 가져오기로 변경
Route::get('/admin/index', 'AdminController@show')->name('admin.index');
//
Route::get('/layouts/nav', 'CustomerController@dashboard')->name('admin.nav');



