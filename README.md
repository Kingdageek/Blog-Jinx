## Blogging Content Management System in Laravel
---
**Blog Jinx** is exactly what this heading says (funny name actually). Worked on this to practise all the Laravel I'd been reading from *Matt Staufer's - Laravel Up and Running* and *Dayle Reeles's - Laravel Codesmart*.

There's ofcourse an admin panel (for superadmins and authors, different permissions) and the Blog frontend (haha) for readers. It's still a work in progress though and again, I tried to follow the Industry-standard practices I currently have knowledge of so, some things may be a little off.

So, *clone the repo*, run `composer install` to get the neccessary packages, copy *.env.example* to your *.env* and enter your app and environment specific details, then run `php artisan migrate` to get the migrations.

In *database/seeds/UsersTableSeeder.php* there's specified admin details you could seed your database with to login first time.
To do that, uncomment the `$this->call(UsersTableSeeder::class)` code in the *DatabaseSeeder* class and then run `php artisan db:seed`.
Then, login with the details in the *UsersTableSeeder* class.

Also, for photo uploads, in the **public** folder, create *uploads/posts* directory for blog post photos and *uploads/avatars* directory for blog admin profile photos.
