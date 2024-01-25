<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AboutInfo;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory()->create([
            'name' => 'admin',
            'password' => '$2y$10$cMPXvg7vJ5mVOxCjsBElk.IqmS32cD/JWTLb2j7wDGXVAhgB3/Asi',
        ]);

        Category::factory()->create([
            'name' => 'T-Shirts',
            'slug' => 't-shirts',
        ]);

        Category::factory()->create([
            'name' => 'Hoodies',
            'slug' => 'hoodies',
        ]);

        Product::factory()->create([
            'title' => 'Friends Vector Designing Hoodie (S/Maroon)',
            'price' => '$10',
            'description' => 'Bring the spirit of camaraderie and laughter into your wardrobe with the "Friends Vector Designing Hoodie."',
            'product_details' => '<p>This cozy and stylish hoodie is inspired by the timeless TV show "Friends" and features a delightful vector design showcasing the beloved characters.</p>

<p>Crafted from high-quality and soft fabric, this hoodie not only offers comfort but also pays homage to the iconic "Friends" series. The regular fit provides a classic and versatile look, making it perfect for casual outings, cozy nights in, or whenever you want to express your love for the camaraderie of this legendary sitcom.</p>

<p>The "Friends Vector Designing Hoodie" isn\'t just clothing; it\'s a celebration of friendship and the joyous moments shared by Ross, Rachel, Chandler, Monica, Joey, and Phoebe. Wear it proudly and connect with fellow fans who share your love for the humor and warmth of "Friends."</p>

<h4>Product Highlights:</h4>

<ul>
<li>Delightful vector design featuring the iconic characters of "Friends"</li>
<li>High-quality and soft fabric for maximum comfort</li>
<li>Regular fit for a classic and versatile style</li>
<li>Perfect for casual outings, cozy nights, and expressing your love for "Friends"</li>
<li>Celebrate the timeless camaraderie of Ross, Rachel, Chandler, Monica, Joey, and Phoebe</li>
</ul>
',
            'main_image' => 'products/00RcQDr84lpt7P944PCDz2lvL1G61SvkeNiKHfZ5.webp',
            'product_images' => '["products/Friends-Vector-Designing-Hoodie-(S/Maroon)/aluwREwuHagwvLhX0Qk6x9PgoNt324WY4I2ByzsW.webp", "products/Friends-Vector-Designing-Hoodie-(S/Maroon)/cHwym9AQgideMqc1PgSWG16rSLjDtI0h2fPDaRXQ.webp", "products/Friends-Vector-Designing-Hoodie-(S/Maroon)/J9ncAn2DRQcUufZUS9j0pa1lGvLkr71PzoI61A7M.webp", "products/Friends-Vector-Designing-Hoodie-(S/Maroon)/k0kF18yMvCxVcmzCkKXA4QBC7jLSOIAgrBajeyft.webp", "products/Friends-Vector-Designing-Hoodie-(S/Maroon)/Pegzj35LKryJ9ScAY1IYNFZxc6HUy5UKEsHTFjd1.webp", "products/Friends-Vector-Designing-Hoodie-(S/Maroon)/VCSDDvpSYNLM7YDUUcmfvWKeP7KqrLpJjSvKLpMr.webp"]',
            'colors' => '["#722138"]',
            'designs' => '["Maroon"]',
            'sizes' => '["SM","MD"]',
            'category_id' => '2'
        ]);


        AboutInfo::factory()->create([
            'about_text' => "<h1>Welcome To Codeswear</h1>
            <p>Codeswear.com is revolutionizing the way India shops for unique, geeky apparel. From our one-of-a-kind hoodie designs to our wide selection of stickers, mugs and other accessories, we have everything you need to express your individuality and stand out from the crowd. Say goodbye to the hassle of hopping from store to store in search of your perfect geeky look. With just a single click on our website, you can find it all!

But what sets Codeswear apart from the competition? The answer is simple: our unique designs and commitment to providing the highest quality products. We understand the importance of style and durability, which is why we put so much effort into creating unique designs and using only the best materials. Don't settle for mediocre clothing and accessories - choose Codeswear and make a statement with your wardrobe.

At Codeswear, we strive to be more than just an online store - we want to be a community where like-minded individuals can come together and express themselves through fashion. Whether you're a gamer, a programmer, or simply someone who loves all things geeky, we have something for you. Our collection is curated with the latest trends and fan favorites in mind, ensuring that you'll always find something new and exciting.

We also understand the importance of affordability and convenience. That's why we offer competitive prices and fast shipping, so you can get your hands on your new geeky apparel as soon as possible. Plus, with our easy-to-use website and secure checkout process, shopping with us is a breeze.

So why wait? Visit Codeswear.com today and discover the latest in geeky fashion. With our unique designs and high-quality products, we're sure you'll find something you'll love. Join our community and express your individuality through fashion.</p>",
        ]);
    }
}
