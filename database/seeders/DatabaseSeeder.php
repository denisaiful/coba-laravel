<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'deni',
            'username' => 'denisaiful',
            'email' => 'saifuldeni@gmail.com',
            'password' => bcrypt('12345')

        ]);

        // User::create([
        //     'name' => 'Saiful',
        //     'email' => 'denisaiful@gmail.com',
        //     'password' => bcrypt('12345')

        // ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::factory(40)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sapien neque, egestas vel felis nec, placerat consequat arcu. Curabitur ut metus nec purus hendrerit rhoncus nec nec dolor. Cras molestie metus lorem, vel rhoncus nulla iaculis in. Vivamus tristique, enim sed hendrerit rutrum, nulla nibh dignissim risus, vel hendrerit dolor justo nec eros. Donec eget lacus sem. Donec malesuada sem libero, ut congue velit efficitur eget. Ut augue est, sodales non dictum quis, iaculis ut elit. Cras egestas malesuada sollicitudin. Curabitur feugiat nisi eget massa volutpat, suscipit dictum sapien commodo. Duis varius consequat erat, in volutpat sem ornare vel. Curabitur eleifend elit in odio auctor, eu ornare est laoreet. Quisque nisi ex, vulputate vel molestie in, placerat sit amet magna. Phasellus et aliquet enim.</p><p>Ut efficitur felis ac est vehicula lobortis. Sed quis urna consectetur, molestie sapien ut, facilisis ipsum. Integer vel dolor eu nunc vulputate fringilla ac eget nibh. Proin blandit interdum rutrum. Curabitur vel convallis justo, a tristique magna. Sed in erat ornare, mattis metus ac, rutrum felis. Vestibulum commodo, tellus at tempus fringilla, justo diam porta felis, eu fermentum lacus dui quis ex. Vestibulum hendrerit, diam posuere convallis maximus, nulla mi commodo est, eu consequat libero tellus vitae elit. Aenean id tortor diam. Cras quis tellus at lacus varius tincidunt. Fusce augue arcu, convallis sed iaculis ut, convallis ut sapien.</p><p>Vivamus libero velit, porttitor ac ultricies in, egestas non diam. Donec tristique ipsum quis interdum commodo. Sed euismod sodales lectus sed facilisis. Nunc scelerisque mollis nisl a eleifend. Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo. Praesent vulputate est eu rhoncus placerat. Nulla quis lobortis arcu. Morbi varius rhoncus leo, ac faucibus elit porttitor et. Maecenas sed suscipit risus. Donec felis sapien, tempor vitae bibendum sed, malesuada sit amet nibh. Integer quis maximus est, sed semper justo. Aliquam dapibus semper leo ac bibendum.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sapien neque, egestas vel felis nec, placerat consequat arcu. Curabitur ut metus nec purus hendrerit rhoncus nec nec dolor. Cras molestie metus lorem, vel rhoncus nulla iaculis in. Vivamus tristique, enim sed hendrerit rutrum, nulla nibh dignissim risus, vel hendrerit dolor justo nec eros. Donec eget lacus sem. Donec malesuada sem libero, ut congue velit efficitur eget. Ut augue est, sodales non dictum quis, iaculis ut elit. Cras egestas malesuada sollicitudin. Curabitur feugiat nisi eget massa volutpat, suscipit dictum sapien commodo. Duis varius consequat erat, in volutpat sem ornare vel. Curabitur eleifend elit in odio auctor, eu ornare est laoreet. Quisque nisi ex, vulputate vel molestie in, placerat sit amet magna. Phasellus et aliquet enim.</p><p>Ut efficitur felis ac est vehicula lobortis. Sed quis urna consectetur, molestie sapien ut, facilisis ipsum. Integer vel dolor eu nunc vulputate fringilla ac eget nibh. Proin blandit interdum rutrum. Curabitur vel convallis justo, a tristique magna. Sed in erat ornare, mattis metus ac, rutrum felis. Vestibulum commodo, tellus at tempus fringilla, justo diam porta felis, eu fermentum lacus dui quis ex. Vestibulum hendrerit, diam posuere convallis maximus, nulla mi commodo est, eu consequat libero tellus vitae elit. Aenean id tortor diam. Cras quis tellus at lacus varius tincidunt. Fusce augue arcu, convallis sed iaculis ut, convallis ut sapien.</p><p>Vivamus libero velit, porttitor ac ultricies in, egestas non diam. Donec tristique ipsum quis interdum commodo. Sed euismod sodales lectus sed facilisis. Nunc scelerisque mollis nisl a eleifend. Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo. Praesent vulputate est eu rhoncus placerat. Nulla quis lobortis arcu. Morbi varius rhoncus leo, ac faucibus elit porttitor et. Maecenas sed suscipit risus. Donec felis sapien, tempor vitae bibendum sed, malesuada sit amet nibh. Integer quis maximus est, sed semper justo. Aliquam dapibus semper leo ac bibendum.</p>',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sapien neque, egestas vel felis nec, placerat consequat arcu. Curabitur ut metus nec purus hendrerit rhoncus nec nec dolor. Cras molestie metus lorem, vel rhoncus nulla iaculis in. Vivamus tristique, enim sed hendrerit rutrum, nulla nibh dignissim risus, vel hendrerit dolor justo nec eros. Donec eget lacus sem. Donec malesuada sem libero, ut congue velit efficitur eget. Ut augue est, sodales non dictum quis, iaculis ut elit. Cras egestas malesuada sollicitudin. Curabitur feugiat nisi eget massa volutpat, suscipit dictum sapien commodo. Duis varius consequat erat, in volutpat sem ornare vel. Curabitur eleifend elit in odio auctor, eu ornare est laoreet. Quisque nisi ex, vulputate vel molestie in, placerat sit amet magna. Phasellus et aliquet enim.</p><p>Ut efficitur felis ac est vehicula lobortis. Sed quis urna consectetur, molestie sapien ut, facilisis ipsum. Integer vel dolor eu nunc vulputate fringilla ac eget nibh. Proin blandit interdum rutrum. Curabitur vel convallis justo, a tristique magna. Sed in erat ornare, mattis metus ac, rutrum felis. Vestibulum commodo, tellus at tempus fringilla, justo diam porta felis, eu fermentum lacus dui quis ex. Vestibulum hendrerit, diam posuere convallis maximus, nulla mi commodo est, eu consequat libero tellus vitae elit. Aenean id tortor diam. Cras quis tellus at lacus varius tincidunt. Fusce augue arcu, convallis sed iaculis ut, convallis ut sapien.</p><p>Vivamus libero velit, porttitor ac ultricies in, egestas non diam. Donec tristique ipsum quis interdum commodo. Sed euismod sodales lectus sed facilisis. Nunc scelerisque mollis nisl a eleifend. Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo. Praesent vulputate est eu rhoncus placerat. Nulla quis lobortis arcu. Morbi varius rhoncus leo, ac faucibus elit porttitor et. Maecenas sed suscipit risus. Donec felis sapien, tempor vitae bibendum sed, malesuada sit amet nibh. Integer quis maximus est, sed semper justo. Aliquam dapibus semper leo ac bibendum.</p>',
        //     'category_id' => 3,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo',
        //     'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sapien neque, egestas vel felis nec, placerat consequat arcu. Curabitur ut metus nec purus hendrerit rhoncus nec nec dolor. Cras molestie metus lorem, vel rhoncus nulla iaculis in. Vivamus tristique, enim sed hendrerit rutrum, nulla nibh dignissim risus, vel hendrerit dolor justo nec eros. Donec eget lacus sem. Donec malesuada sem libero, ut congue velit efficitur eget. Ut augue est, sodales non dictum quis, iaculis ut elit. Cras egestas malesuada sollicitudin. Curabitur feugiat nisi eget massa volutpat, suscipit dictum sapien commodo. Duis varius consequat erat, in volutpat sem ornare vel. Curabitur eleifend elit in odio auctor, eu ornare est laoreet. Quisque nisi ex, vulputate vel molestie in, placerat sit amet magna. Phasellus et aliquet enim.</p><p>Ut efficitur felis ac est vehicula lobortis. Sed quis urna consectetur, molestie sapien ut, facilisis ipsum. Integer vel dolor eu nunc vulputate fringilla ac eget nibh. Proin blandit interdum rutrum. Curabitur vel convallis justo, a tristique magna. Sed in erat ornare, mattis metus ac, rutrum felis. Vestibulum commodo, tellus at tempus fringilla, justo diam porta felis, eu fermentum lacus dui quis ex. Vestibulum hendrerit, diam posuere convallis maximus, nulla mi commodo est, eu consequat libero tellus vitae elit. Aenean id tortor diam. Cras quis tellus at lacus varius tincidunt. Fusce augue arcu, convallis sed iaculis ut, convallis ut sapien.</p><p>Vivamus libero velit, porttitor ac ultricies in, egestas non diam. Donec tristique ipsum quis interdum commodo. Sed euismod sodales lectus sed facilisis. Nunc scelerisque mollis nisl a eleifend. Nunc eget mauris ac eros pretium convallis. Morbi in venenatis quam, et viverra sem. Nunc metus enim, feugiat ac dictum a, sollicitudin et leo. Praesent vulputate est eu rhoncus placerat. Nulla quis lobortis arcu. Morbi varius rhoncus leo, ac faucibus elit porttitor et. Maecenas sed suscipit risus. Donec felis sapien, tempor vitae bibendum sed, malesuada sit amet nibh. Integer quis maximus est, sed semper justo. Aliquam dapibus semper leo ac bibendum.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
