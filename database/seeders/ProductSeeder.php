<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [

            // Smartphones
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'The iPhone 15 Pro Max features Apple’s latest A17 Pro chip, a premium titanium body, advanced triple-camera system, and a stunning Super Retina XDR display. Designed for high performance, gaming, photography, and seamless everyday use with long-lasting battery life.',
                'price' => 119999,
                'image' => 'product-image/Smartphones/iphone.jpg'
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Samsung Galaxy S24 Ultra delivers top-tier performance with Snapdragon processor, built-in S Pen, 200MP professional-grade camera, and immersive AMOLED display. It is perfect for productivity, creativity, gaming, and premium smartphone experience with powerful battery and AI features.',
                'price' => 109999,
                'image' => 'product-image/Smartphones/samsung.jpg'
            ],
            [
                'name' => 'OnePlus 12',
                'description' => 'OnePlus 12 combines flagship-level performance with Snapdragon 8 Gen 3 processor, smooth AMOLED display, fast charging technology, and a versatile camera setup. It offers exceptional speed, premium design, and reliable battery performance, making it ideal for power users and gamers.',
                'price' => 64999,
                'image' => 'product-image/Smartphones/oneplus.jpg'
            ],
            [
                'name' => 'Google Pixel 8 Pro',
                'description' => 'Google Pixel 8 Pro is designed for photography lovers with AI-powered camera features, clean Android experience, and advanced computational photography. It delivers smooth performance, premium design, and intelligent features that enhance daily productivity and user experience.',
                'price' => 89999,
                'image' => 'product-image/Smartphones/pixel.jpg'
            ],
            [
                'name' => 'Xiaomi 14 Pro',
                'description' => 'Xiaomi 14 Pro features a Leica-tuned camera system, powerful flagship processor, ultra-fast charging, and premium design. It offers excellent performance, stunning visuals, and professional photography capabilities, making it a perfect choice for tech enthusiasts and creative users.',
                'price' => 79999,
                'image' => 'product-image/Smartphones/xiaomi.jpg'
            ],

            // Laptops
            [
                'name' => 'MacBook Pro M3',
                'description' => 'MacBook Pro M3 delivers exceptional performance with Apple’s latest M3 chip, stunning Retina display, long battery life, and premium build quality. It is ideal for developers, designers, and professionals who need powerful performance, smooth multitasking, and reliable productivity.',
                'price' => 159999,
                'image' => 'product-image/Laptops/macbook.jpg'
            ],
            [
                'name' => 'Dell XPS 15',
                'description' => 'Dell XPS 15 is a premium ultrabook featuring an immersive OLED display, powerful Intel processor, sleek design, and excellent build quality. It is perfect for professionals, content creators, and students who need high performance, portability, and stunning visuals.',
                'price' => 139999,
                'image' => 'product-image/Laptops/dell.jpg'
            ],
            [
                'name' => 'ASUS ROG Zephyrus',
                'description' => 'ASUS ROG Zephyrus is a high-performance gaming laptop equipped with powerful GPU, fast processor, and advanced cooling system. It delivers smooth gaming, fast rendering, and immersive visuals, making it ideal for gamers and creative professionals.',
                'price' => 129999,
                'image' => 'product-image/Laptops/asus.jpg'
            ],
            [
                'name' => 'HP Spectre x360',
                'description' => 'HP Spectre x360 is a premium 2-in-1 convertible laptop featuring sleek design, powerful performance, touchscreen display, and long battery life. It is ideal for professionals and students who need flexibility, portability, and stylish productivity in one device.',
                'price' => 109999,
                'image' => 'product-image/Laptops/hp.jpg'
            ],
            [
                'name' => 'Lenovo ThinkPad X1',
                'description' => 'Lenovo ThinkPad X1 is a business-class laptop known for durability, security, and performance. With premium build quality, powerful hardware, and enterprise-grade features, it is ideal for corporate users and professionals who demand reliability and productivity.',
                'price' => 119999,
                'image' => 'product-image/Laptops/lenovo.jpg'
            ],

            // Accessories
            [
                'name' => 'AirPods Pro 2',
                'description' => 'AirPods Pro 2 offers active noise cancellation, spatial audio, and premium sound quality in a compact wireless design. With long battery life and seamless Apple ecosystem integration, it delivers an immersive listening experience for music, calls, and entertainment.',
                'price' => 19999,
                'image' => 'product-image/Accessories/airpods.jpg'
            ],
            [
                'name' => 'Apple Watch Ultra 2',
                'description' => 'Apple Watch Ultra 2 is a rugged smartwatch designed for outdoor adventures and fitness tracking. It features advanced health sensors, GPS, long battery life, and premium build quality, making it ideal for athletes and adventure enthusiasts.',
                'price' => 79999,
                'image' => 'product-image/Accessories/watch.jpg'
            ],
            [
                'name' => 'Wireless Keyboard',
                'description' => 'This wireless mechanical keyboard delivers fast response, comfortable typing experience, and durable build quality. It is ideal for professionals, gamers, and everyday users who want efficiency, precision, and a premium typing experience.',
                'price' => 9999,
                'image' => 'product-image/Accessories/keyboard.jpg'
            ],
            [
                'name' => 'Wireless Mouse',
                'description' => 'This ergonomic wireless mouse offers precise tracking, smooth performance, and comfortable grip for long hours of use. It is ideal for productivity, office work, and creative tasks, providing reliable performance and modern design.',
                'price' => 8999,
                'image' => 'product-image/Accessories/mouse.jpg'
            ],
            [
                'name' => 'Power Bank 20000mAh',
                'description' => 'This high-capacity power bank provides fast charging and reliable backup power for smartphones and devices. With multiple ports and compact design, it is ideal for travel, daily use, and emergency power needs.',
                'price' => 2999,
                'image' => 'product-image/Accessories/powerbank.jpg'
            ],

            // Gaming
            [
                'name' => 'PS5 Slim',
                'description' => 'PS5 Slim delivers next-generation gaming with powerful hardware, ultra-fast loading, and stunning 4K graphics. It offers immersive gameplay, advanced controller features, and a vast library of games, making it perfect for modern gamers.',
                'price' => 49999,
                'image' => 'product-image/Gaming/ps5.webp'
            ],
            [
                'name' => 'Nintendo Switch OLED',
                'description' => 'Nintendo Switch OLED features a vibrant OLED display, portable design, and versatile gaming modes. It allows you to play games at home or on the go, making it ideal for casual and hardcore gamers alike.',
                'price' => 32999,
                'image' => 'product-image/Gaming/switch.jpg'
            ],
            [
                'name' => 'Xbox Series X',
                'description' => 'Xbox Series X is a powerful gaming console delivering true 4K gaming performance, fast load times, and immersive gameplay. It supports a wide range of games and features, making it ideal for serious gamers.',
                'price' => 54999,
                'image' => 'product-image/Gaming/xbox.jpg'
            ],
            [
                'name' => 'Gaming Headset',
                'description' => 'This wireless gaming headset offers immersive sound, noise isolation, and comfortable design for long gaming sessions. It delivers clear communication and high-quality audio, making it ideal for competitive gaming and entertainment.',
                'price' => 24999,
                'image' => 'product-image/Gaming/headset.jpg'
            ],
            [
                'name' => 'Gaming Mouse',
                'description' => 'This professional gaming mouse features high precision, customizable DPI, and ergonomic design. It delivers fast response and accuracy, making it ideal for competitive gaming and high-performance tasks.',
                'price' => 6999,
                'image' => 'product-image/Gaming/gamingmouse.jpg'
            ],

            // Audio
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Sony WH-1000XM5 headphones deliver industry-leading noise cancellation, premium sound quality, and long battery life. With comfortable design and smart features, they provide an exceptional listening experience for music, calls, and travel.',
                'price' => 29999,
                'image' => 'product-image/Audio/sony.webp'
            ],
            [
                'name' => 'Bose QuietComfort Ultra',
                'description' => 'Bose QuietComfort Ultra headphones offer premium audio quality, advanced noise cancellation, and superior comfort. Designed for immersive listening, they are ideal for music lovers, travelers, and professionals.',
                'price' => 27999,
                'image' => 'product-image/Audio/bose.jpg'
            ],
            [
                'name' => 'Apple HomePod Mini',
                'description' => 'Apple HomePod Mini is a compact smart speaker with rich sound quality and Siri integration. It offers smart home control, seamless Apple ecosystem connectivity, and premium audio performance in a stylish design.',
                'price' => 9999,
                'image' => 'product-image/Audio/homepod.jpeg'
            ],
            [
                'name' => 'Wireless Earbuds',
                'description' => 'These wireless earbuds deliver clear sound, deep bass, and stable connectivity. With compact design and long battery life, they are perfect for music, calls, workouts, and everyday use.',
                'price' => 6999,
                'image' => 'product-image/Audio/earbuds.webp'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
