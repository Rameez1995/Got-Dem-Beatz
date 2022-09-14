<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /**
     * Permission items
     *
     */
    $permissionItems = [
      [
        'name'        => 'Admin dashboard view',
        'slug'        => 'admin.dashboard.view',
        'description' => 'Can view admin dashboard',
        'model'       => null,
        'status'      => 1,
      ],
      [
        'name'        => 'View Users',
        'slug'        => 'view.users',
        'description' => 'Can view users',
        'model'       => 'App\Models\User',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Users',
        'slug'        => 'create.users',
        'description' => 'Can create new users',
        'model'       => 'App\Models\User',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Users',
        'slug'        => 'update.users',
        'description' => 'Can Update users',
        'model'       => 'App\Models\User',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Users',
        'slug'        => 'delete.users',
        'description' => 'Can delete users',
        'model'       => 'App\Models\User',
        'status'      => 1,
      ],
      [
        'name'        => 'Roles Permission',
        'slug'        => 'view.roles.permissions',
        'description' => 'Can view roles & permission',
        'model'       => 'App\Models\Role',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Roles',
        'slug'        => 'create.roles',
        'description' => 'Can create roles',
        'model'       => 'App\Models\Role',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Roles',
        'slug'        => 'update.roles',
        'description' => 'Can update roles',
        'model'       => 'App\Models\Role',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Roles',
        'slug'        => 'delete.roles',
        'description' => 'Can delete roles',
        'model'       => 'App\Models\Role',
        'status'      => 1,
      ],
      [
        'name'        => 'View Pages',
        'slug'        => 'view.pages',
        'description' => 'Can view pages',
        'model'       => 'App\Models\Page',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Pages',
        'slug'        => 'create.pages',
        'description' => 'Can create new pages',
        'model'       => 'App\Models\Page',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Pages',
        'slug'        => 'update.pages',
        'description' => 'Can Update pages',
        'model'       => 'App\Models\Page',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Pages',
        'slug'        => 'delete.pages',
        'description' => 'Can delete pages',
        'model'       => 'App\Models\Page',
        'status'      => 1,
      ],
      [
        'name'        => 'View Blog Category',
        'slug'        => 'view.blog.category',
        'description' => 'Can view blog categories',
        'model'       => 'App\Models\BlogCategory',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Blog Category',
        'slug'        => 'create.blog.category',
        'description' => 'Can create new blog categories',
        'model'       => 'App\Models\BlogCategory',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Blog Category',
        'slug'        => 'update.blog.category',
        'description' => 'Can update blog categories',
        'model'       => 'App\Models\BlogCategory',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Blog Category',
        'slug'        => 'delete.blog.category',
        'description' => 'Can delete blog categories',
        'model'       => 'App\Models\BlogCategory',
        'status'      => 1,
      ],
      [
        'name'        => 'View Blog Article',
        'slug'        => 'view.blog.article',
        'description' => 'Can view blog articles',
        'model'       => 'App\Models\BlogArticle',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Blog Article',
        'slug'        => 'create.blog.article',
        'description' => 'Can create new blog articles',
        'model'       => 'App\Models\BlogArticle',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Blog Article',
        'slug'        => 'blog.article.update',
        'description' => 'Can update blog articles',
        'model'       => 'App\Models\BlogArticle',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Blog Article',
        'slug'        => 'delete.blog.article',
        'description' => 'Can delete blog articles',
        'model'       => 'App\Models\BlogArticle',
        'status'      => 1,
      ],
      [
        'name'        => 'Update App Settings',
        'slug'        => 'update.app.settings',
        'description' => 'Can update app settings',
        'model'       => 'App\Models\AppSetting',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Web Settings',
        'slug'        => 'update.web.settings',
        'description' => 'Can update web settings',
        'model'       => 'App\Models\WebSetting',
        'status'      => 1,
      ],
      [
        'name'        => 'User Dashboard View',
        'slug'        => 'user.dashboard.view',
        'description' => 'Can view user dashboard',
        'model'       => null,
        'status'      => 1,
      ],
      [
        'name'        => 'View Categories',
        'slug'        => 'view.categories',
        'description' => 'Can view categories',
        'model'       => 'App\Models\Category',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Categories',
        'slug'        => 'create.categories',
        'description' => 'Can create new categories',
        'model'       => 'App\Models\Category',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Categories',
        'slug'        => 'update.categories',
        'description' => 'Can update categories',
        'model'       => 'App\Models\Category',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Categories',
        'slug'        => 'delete.categories',
        'description' => 'Can delete categories',
        'model'       => 'App\Models\Category',
        'status'      => 1,
      ],
      [
        'name'        => 'View Drum Kits Loops',
        'slug'        => 'view.drum_kit_loops',
        'description' => 'Can view drum kits loops',
        'model'       => 'App\Models\DrumKitLoop',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Drum Kits Loops',
        'slug'        => 'create.drum_kit_loops',
        'description' => 'Can create new drum kits loops',
        'model'       => 'App\Models\DrumKitLoop',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Drum Kits Loops',
        'slug'        => 'update.drum_kit_loops',
        'description' => 'Can update drum kits loops',
        'model'       => 'App\Models\DrumKitLoop',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Drum Kits Loops',
        'slug'        => 'delete.drum_kit_loops',
        'description' => 'Can delete drum kits loops',
        'model'       => 'App\Models\DrumKitLoop',
        'status'      => 1,
      ],
      [
        'name'        => 'View Songs',
        'slug'        => 'view.songs',
        'description' => 'Can view songs',
        'model'       => 'App\Models\Song',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Songs',
        'slug'        => 'create.songs',
        'description' => 'Can create new songs',
        'model'       => 'App\Models\Song',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Songs',
        'slug'        => 'update.songs',
        'description' => 'Can update songs',
        'model'       => 'App\Models\Song',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Songs',
        'slug'        => 'delete.songs',
        'description' => 'Can delete songs',
        'model'       => 'App\Models\Song',
        'status'      => 1,
      ],
      [
        'name'        => 'View Services',
        'slug'        => 'view.services',
        'description' => 'Can view services',
        'model'       => 'App\Models\Service',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Services',
        'slug'        => 'create.services',
        'description' => 'Can create new services',
        'model'       => 'App\Models\Service',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Services',
        'slug'        => 'update.services',
        'description' => 'Can update services',
        'model'       => 'App\Models\Service',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Services',
        'slug'        => 'delete.services',
        'description' => 'Can delete services',
        'model'       => 'App\Models\Service',
        'status'      => 1,
      ],
      [
        'name'        => 'View Abouts',
        'slug'        => 'view.abouts',
        'description' => 'Can view abouts',
        'model'       => 'App\Models\About',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Abouts',
        'slug'        => 'create.abouts',
        'description' => 'Can create new abouts',
        'model'       => 'App\Models\About',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Abouts',
        'slug'        => 'update.abouts',
        'description' => 'Can update abouts',
        'model'       => 'App\Models\About',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Abouts',
        'slug'        => 'delete.abouts',
        'description' => 'Can delete abouts',
        'model'       => 'App\Models\About',
        'status'      => 1,
      ],
      [
        'name'        => 'View Producers',
        'slug'        => 'view.producers',
        'description' => 'Can view producers',
        'model'       => 'App\Models\Producer',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Producers',
        'slug'        => 'create.producers',
        'description' => 'Can create new producers',
        'model'       => 'App\Models\Producer',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Producers',
        'slug'        => 'update.producers',
        'description' => 'Can update producers',
        'model'       => 'App\Models\Producer',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Producers',
        'slug'        => 'delete.producers',
        'description' => 'Can delete producers',
        'model'       => 'App\Models\Producer',
        'status'      => 1,
      ],
      [
        'name'        => 'View Spotlights',
        'slug'        => 'view.spotlights',
        'description' => 'Can view spotlights',
        'model'       => 'App\Models\Spotlight',
        'status'      => 1,
      ],
      [
        'name'        => 'Create Spotlights',
        'slug'        => 'create.spotlights',
        'description' => 'Can create new spotlights',
        'model'       => 'App\Models\Spotlight',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Spotlights',
        'slug'        => 'update.spotlights',
        'description' => 'Can update spotlights',
        'model'       => 'App\Models\Spotlight',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Spotlights',
        'slug'        => 'delete.spotlights',
        'description' => 'Can delete spotlights',
        'model'       => 'App\Models\Spotlight',
        'status'      => 1,
      ],
      [
        'name'        => 'View Memberships',
        'slug'        => 'view.memberships',
        'description' => 'Can view memberships',
        'model'       => 'App\Models\Membership',
        'status'      => 1,
      ],
      [
        'name'        => 'Update Memberships',
        'slug'        => 'update.memberships',
        'description' => 'Can update memberships',
        'model'       => 'App\Models\Membership',
        'status'      => 1,
      ],
      [
        'name'        => 'Delete Memberships',
        'slug'        => 'delete.memberships',
        'description' => 'Can delete memberships',
        'model'       => 'App\Models\Membership',
        'status'      => 1,
      ],
    ];

    /**
     * Add permission items
     *
     */
    echo "\e[32mSeeding:\e[0m PermissionitemsTableSeeder\r\n";
    foreach ($permissionItems as $permissionItem) {
      $newPermissionItem = Permission::where('slug', '=', $permissionItem['slug'])->first();
      if ($newPermissionItem === null) {
        $newPermissionItem = Permission::create([
          'name'          => $permissionItem['name'],
          'slug'          => $permissionItem['slug'],
          'description'   => $permissionItem['description'],
          'model'         => $permissionItem['model'],
        ]);
        echo "\e[32mSeeding:\e[0m PermissionitemsTableSeeder - Permission:" . $permissionItem['slug'] . "\r\n";
      }
    }
    echo "\e[32mSeeding:\e[0m Permissions - complete\r\n";
  }
}
