<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProducersController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SpotlightsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DrumKitLoopsController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\DrumKitLoopOrdersController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AboutUSController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\WebSettingController;
use App\Http\Controllers\BlogArticleController;
use App\Http\Controllers\BlogCategoryController;

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

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('aboutus');
Route::get('/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/contact', [PagesController::class, 'contact'])->name('contactus');
Route::get('/membership', [MembershipController::class, 'view_membership'])->name('membership');
Route::get('/services', [PagesController::class, 'services'])->name('ourservices');
Route::get('/all_beats', [PagesController::class, 'all_songs'])->name('all_songs');
Route::get('/search_beats', [PagesController::class, 'search_songs'])->name('search');
Route::get('/all/tracks', [PagesController::class, 'all_songs'])->name('all_beats');
Route::get('/all_spotlights', [PagesController::class, 'all_spotlights'])->name('all_spotlights');
Route::get('beat/{beat_id}', [PagesController::class, 'beat'])->name('beat');
Route::get('/drum_kit_loops/{id}', [PagesController::class, 'specific_drum_kit_loop']);
Route::get('/privacy-policy', [PagesController::class, 'privacy_policy']);
Route::get('/terms-condition', [PagesController::class, 'terms_condition']);

Route::get('/services/custom_beat', [ServicesController::class, 'custom_beat']);
Route::get('/services/drum_kits_loops', [ServicesController::class, 'drum_kits_loops']);
Route::get('/services/mix_mastering', [ServicesController::class, 'mix_mastering']);

Route::get('cart', [SongsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [SongsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [SongsController::class, 'cartupdate'])->name('update.cart');
Route::delete('remove-from-cart', [SongsController::class, 'remove'])->name('remove.from.cart');

Route::get('/paywithpaypal', [PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::get('/songpaywithpaypal', [CheckoutController::class, 'payWithPaypal'])->name('songpaywithpaypal');
Route::post('/paypal', [PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('/paypal', [PaypalController::class, 'getPaymentStatus'])->name('status');
Route::get('/songpaypal', [CheckoutController::class, 'getPaymentStatus'])->name('songstatus');

Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

Route::post('checkout', [CheckoutController::class, 'postPaymentWithpaypal'])->name('checkout');
Route::get('checkout1', [CheckoutController::class, 'index'])->name('checkout1');

Route::post('checkout_drum_kits_loops', [DrumKitLoopOrdersController::class, 'checkout_drum_kits_loops'])->name('checkout_drum_kits_loops');
Route::post('pay_drum_kits_loops', [DrumKitLoopOrdersController::class, 'pay_drum_kits_loops'])->name('pay_drum_kits_loops');
Route::get('/status_drum_kits_loops', [DrumKitLoopOrdersController::class, 'status_drum_kits_loops'])->name('status_drum_kits_loops');

Route::get('tag/{tag}', [PagesController::class, 'tags_songs'])->name('tags.songs');

Route::get('/social-media-share', [PagesController::class,'index']);

Route::prefix('/user')->group(function () {
Route::middleware(['auth'])->group(function () {
  
  Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('user.dashboard')
    ->middleware('checkpermission:user.dashboard.view');

  Route::get('/my-songs', [SongsController::class, 'my_songs'])
  ->name('user.my-songs');

  Route::get('/my-drum-kits-loops', [DrumKitLoopsController::class, 'my_drum_kits_loops'])
  ->name('user.my-drum-kits-loops');

  Route::get('/membership', [SongsController::class, 'membership'])
  ->name('user.membership');

  Route::get('/settings', [SettingsController::class, 'index'])
  ->name('user.setting');

  Route::get('/settings/edit_profile', [SettingsController::class, 'edit_profile'])
  ->name('user.edit_profile');
  Route::put('/settings/update_profile/{id}', [SettingsController::class, 'update_profile'])
  ->name('user.update_profile');

  Route::get('/settings/change_password', [SettingsController::class, 'get_password'])
  ->name('user.get_password');
  Route::post('/settings/update_password', [SettingsController::class, 'change_password'])
  ->name('user.change_password');

  Route::get('/settings/payment_method/cards', [SettingsController::class, 'cards'])
  ->name('user.cards');
  Route::get('/settings/payment_method/add_card', [SettingsController::class, 'get_card'])
  ->name('user.get_card');
  Route::get('/settings/payment_method/edit_card/{id}', [SettingsController::class, 'edit_card'])
  ->name('user.edit_card');
  Route::put('/settings/payment_method/update_card', [SettingsController::class, 'update_card'])
  ->name('user.update_card');
  Route::post('/settings/payment_method/store_card', [SettingsController::class, 'store_card'])
  ->name('user.store_card');

});
});


require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Admin dashboard Routes
|--------------------------------------------------------------------------
*/




Route::prefix('/admin')->group(function () {
  Route::middleware(['checkrole:admin'])->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])
      ->name('admin.dashboard')
      ->middleware('checkpermission:admin.dashboard.view');

    // Users
    Route::get('/users', [UsersController::class, 'index'])
      ->name('view.users')
      ->middleware('checkpermission:view.users');

    Route::get('/user/add', [UsersController::class, 'create'])
      ->name('create.users')
      ->middleware('checkpermission:create.users');

    Route::post('/user/save', [UsersController::class, 'store'])
      ->name('save.users')
      ->middleware('checkpermission:create.users');

    Route::get('/user/delete/{id}', [UsersController::class, 'destroy'])
      ->name('delete.users')
      ->middleware('checkpermission:delete.users');

    Route::get('/user/edit/{id}', [UsersController::class, 'edit'])
      ->name('edit.users')
      ->middleware('checkpermission:update.users');

    Route::put('/user/{id}', [UsersController::class, 'update'])
      ->name('update.users')
      ->middleware('checkpermission:update.users');

    // Roles & permissions
    Route::get('/roles-permissions', [AccessController::class, 'index'])
      ->name('view.roles-permissions')
      ->middleware('checkpermission:view.roles.permissions');

    Route::prefix('/role')->name('role')->group(function () {
      Route::get('/add', [RoleController::class, 'create'])
        ->name('.create')
        ->middleware('checkpermission:create.roles');

      Route::post('/store', [RoleController::class, 'store'])
        ->name('.save')
        ->middleware('checkpermission:create.roles');

      Route::get('/edit/{id}', [RoleController::class, 'edit'])
        ->name('.edit')
        ->middleware('checkpermission:update.roles');

      Route::put('/{id}', [RoleController::class, 'update'])
        ->name('.update')
        ->middleware('checkpermission:update.roles');

      Route::get('/delete/{id}', [RoleController::class, 'destroy'])
        ->name('.delete')
        ->middleware('checkpermission:delete.roles');
    });

    //Categories
    Route::get('/categories', [CategoriesController::class, 'index'])
      ->name('view.categories')
      ->middleware('checkpermission:view.categories');

    Route::get('/category/add', [CategoriesController::class, 'create'])
      ->name('create.categories')
      ->middleware('checkpermission:create.categories');

    Route::post('/category/save', [CategoriesController::class, 'store'])
      ->name('save.categories')
      ->middleware('checkpermission:create.categories');

    Route::get('/category/delete/{id}', [CategoriesController::class, 'destroy'])
      ->name('delete.categories')
      ->middleware('checkpermission:delete.categories');

    Route::get('/category/edit/{id}', [CategoriesController::class, 'edit'])
      ->name('edit.categories')
      ->middleware('checkpermission:update.categories');

    Route::put('/category/{id}', [CategoriesController::class, 'update'])
      ->name('update.categories')
      ->middleware('checkpermission:update.categories');

  //Producers
  Route::get('/producers', [ProducersController::class, 'index'])
    ->name('view.producers')
    ->middleware('checkpermission:view.producers');

  Route::get('/producer/add', [ProducersController::class, 'create'])
    ->name('create.producers')
    ->middleware('checkpermission:create.producers');

  Route::post('/producer/save', [ProducersController::class, 'store'])
    ->name('save.producers')
    ->middleware('checkpermission:create.producers');

  Route::get('/producer/delete/{id}', [ProducersController::class, 'destroy'])
    ->name('delete.producers')
    ->middleware('checkpermission:delete.producers');

  Route::get('/producer/edit/{id}', [ProducersController::class, 'edit'])
    ->name('edit.producers')
    ->middleware('checkpermission:update.producers');

  Route::put('/producer/{id}', [ProducersController::class, 'update'])
    ->name('update.producers')
    ->middleware('checkpermission:update.producers');


  //Services
  Route::get('/services', [ServicesController::class, 'index'])
    ->name('view.services')
    ->middleware('checkpermission:view.services');

  Route::get('/service/add', [ServicesController::class, 'create'])
    ->name('create.services')
    ->middleware('checkpermission:create.services');

  Route::post('/service/save', [ServicesController::class, 'store'])
    ->name('save.services')
    ->middleware('checkpermission:create.services');

  Route::get('/service/delete/{id}', [ServicesController::class, 'destroy'])
    ->name('delete.services')
    ->middleware('checkpermission:delete.services');

  Route::get('/service/edit/{id}', [ServicesController::class, 'edit'])
    ->name('edit.services')
    ->middleware('checkpermission:update.services');

  Route::put('/service/{id}', [ServicesController::class, 'update'])
    ->name('update.services')
    ->middleware('checkpermission:update.services');
    
  //Spotlight
  Route::get('/spotlights', [SpotlightsController::class, 'index'])
    ->name('view.spotlights')
    ->middleware('checkpermission:view.spotlights');

  Route::get('/spotlight/add', [SpotlightsController::class, 'create'])
    ->name('create.spotlights')
    ->middleware('checkpermission:create.spotlights');

  Route::post('/spotlight/save', [SpotlightsController::class, 'store'])
    ->name('save.spotlights')
    ->middleware('checkpermission:create.spotlights');

  Route::get('/spotlight/delete/{id}', [SpotlightsController::class, 'destroy'])
    ->name('delete.spotlights')
    ->middleware('checkpermission:delete.spotlights');

  Route::get('/spotlight/edit/{id}', [SpotlightsController::class, 'edit'])
    ->name('edit.spotlights')
    ->middleware('checkpermission:update.spotlights');

  Route::put('/spotlight/{id}', [SpotlightsController::class, 'update'])
    ->name('update.spotlights')
    ->middleware('checkpermission:update.spotlights');

    //Membership
    Route::get('/membership', [MembershipController::class, 'index'])
    ->name('view.memberships')
    ->middleware('checkpermission:view.memberships');

    Route::get('/membership/edit/{id}', [MembershipController::class, 'edit'])
    ->name('edit.memberships')
    ->middleware('checkpermission:update.memberships');

    Route::put('/membership/{id}', [MembershipController::class, 'update'])
    ->name('update.memberships')
    ->middleware('checkpermission:update.memberships');

    // About US
    Route::get('/abouts', [AboutUSController::class, 'index'])
      ->name('view.abouts')
      ->middleware('checkpermission:view.abouts');

    Route::get('/about/add', [AboutUSController::class, 'create'])
      ->name('create.abouts')
      ->middleware('checkpermission:create.abouts');

    Route::post('/about/save', [AboutUSController::class, 'store'])
      ->name('save.abouts')
      ->middleware('checkpermission:create.abouts');

    Route::get('/about/delete/{id}', [AboutUSController::class, 'destroy'])
      ->name('delete.abouts')
      ->middleware('checkpermission:delete.abouts');

    Route::get('/about/edit/{id}', [AboutUSController::class, 'edit'])
      ->name('edit.abouts')
      ->middleware('checkpermission:update.abouts');

    Route::put('/about/{id}', [AboutUSController::class, 'update'])
      ->name('update.abouts')
      ->middleware('checkpermission:update.abouts');
      
  // Drum Kits / Loops
  Route::get('/drum_kits_loops', [DrumKitLoopsController::class, 'index'])
    ->name('view.drum_kit_loops')
    ->middleware('checkpermission:view.drum_kit_loops');

  Route::get('/drum_kits_loops/add', [DrumKitLoopsController::class, 'create'])
    ->name('create.drum_kit_loops')
    ->middleware('checkpermission:create.drum_kit_loops');

  Route::post('/drum_kits_loops/save', [DrumKitLoopsController::class, 'store'])
    ->name('save.drum_kit_loops')
    ->middleware('checkpermission:create.drum_kit_loops');

  Route::get('/drum_kits_loops/delete/{id}', [DrumKitLoopsController::class, 'destroy'])
    ->name('delete.drum_kit_loops')
    ->middleware('checkpermission:delete.drum_kit_loops');

  Route::get('/drum_kits_loops/edit/{id}', [DrumKitLoopsController::class, 'edit'])
    ->name('edit.drum_kit_loops')
    ->middleware('checkpermission:update.drum_kit_loops');

    Route::get('/drum_kits_loops/view/{id}', [DrumKitLoopsController::class, 'view_songs'])
    ->name('view.drum_kit_loops')
    ->middleware('checkpermission:view.drum_kit_loops');  

  Route::put('/drum_kits_loops/{id}', [DrumKitLoopsController::class, 'update'])
    ->name('update.drum_kit_loops')
    ->middleware('checkpermission:update.drum_kit_loops');

  //Songs
  Route::get('/songs', [SongsController::class, 'index'])
  ->name('view.songs')
  ->middleware('checkpermission:view.songs');

  Route::get('/song/add', [SongsController::class, 'create'])
  ->name('create.songs')
  ->middleware('checkpermission:create.songs');

  Route::post('/song/save', [SongsController::class, 'store'])
  ->name('save.songs')
  ->middleware('checkpermission:create.songs');
  
  Route::get('/song/delete/{id}', [SongsController::class, 'destroy'])
  ->name('delete.songs')
  ->middleware('checkpermission:delete.songs');

  Route::get('/song/edit/{id}', [SongsController::class, 'edit'])
  ->name('edit.songs')
  ->middleware('checkpermission:update.songs');

  Route::put('/song/{id}', [SongsController::class, 'update'])
  ->name('update.songs')
  ->middleware('checkpermission:update.songs');

    // Site pages
    Route::get('/pages', [PageController::class, 'index'])
      ->name('view.pages')
      ->middleware('checkpermission:view.pages');

    Route::get('/page/add', [PageController::class, 'create'])
      ->name('create.pages')
      ->middleware('checkpermission:create.pages');

    Route::post('/page/save', [PageController::class, 'store'])
      ->name('save.pages')
      ->middleware('checkpermission:create.pages');

    Route::get('/page/delete/{id}', [PageController::class, 'destroy'])
      ->name('delete.pages')
      ->middleware('checkpermission:delete.pages');

    Route::get('/page/edit/{id}', [PageController::class, 'edit'])
      ->name('edit.pages')
      ->middleware('checkpermission:update.pages');

    Route::put('/page/{id}', [PageController::class, 'update'])
      ->name('update.pages')
      ->middleware('checkpermission:update.pages');

    // Blog Category
    Route::get('/blog/category', [BlogCategoryController::class, 'index'])
      ->name('blog.category.view')
      ->middleware('checkpermission:view.blog.category');

    Route::get('/blog/category/add', [BlogCategoryController::class, 'create'])
      ->name('blog.category.create')
      ->middleware('checkpermission:create.blog.category');

    Route::post('/blog/category/add', [BlogCategoryController::class, 'store'])
      ->middleware('checkpermission:create.blog.category');

    Route::get('/blog/category/delete/{id}', [BlogCategoryController::class, 'destroy'])
      ->name('blog.category.delete')
      ->middleware('checkpermission:delte.blog.category');

    Route::get('/blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])
      ->name('blog.category.update')
      ->middleware('checkpermission:update.blog.category');

    Route::put('/blog/category/edit/{id}', [BlogCategoryController::class, 'update'])
      ->middleware('checkpermission:update.blog.category');

    // Blog Article
    Route::get('/blog/article/{id}', [BlogArticleController::class, 'index'])
      ->name('blog.article.view')
      ->middleware('checkpermission:view.blog.article');

    Route::get('/blog/article/add/{id}', [BlogArticleController::class, 'create'])
      ->name('blog.article.create')
      ->middleware('checkpermission:create.blog.article');

    Route::post('/blog/article/add/{id}', [BlogArticleController::class, 'store']);

    Route::get('/blog/article/delete/{id}', [BlogArticleController::class, 'destroy'])
      ->name('blog.article.delete')
      ->middleware('checkpermission:delete.blog.article');

    Route::get('/blog/article/edit/{id}', [BlogArticleController::class, 'edit'])
      ->name('blog.article.update')
      ->middleware('checkpermission:update.blog.article');

    Route::put('/blog/article/edit/{id}', [BlogArticleController::class, 'update']);

    // App setttings
    Route::get('/app-setting/edit/{id}', [AppSettingController::class, 'edit'])
      ->name('edit.app-setting')
      ->middleware('checkpermission:update.app.settings');

    Route::put('/app-setting/{id}', [AppSettingController::class, 'update'])
      ->name('update.app-setting')
      ->middleware('checkpermission:update.app.settings');


    // Web settings
    Route::get('/web-setting/edit/{id}', [WebSettingController::class, 'edit'])
      ->name('edit.web-setting')
      ->middleware('checkpermission:update.web.settings');

    Route::put('/web-setting/{id}', [WebSettingController::class, 'update'])
      ->name('update.web-setting')
      ->middleware('checkpermission:update.web.settings');
  });
});
