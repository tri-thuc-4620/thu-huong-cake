# PLAN CHI TIET: Laravel Backend + Filament Admin cho Thu Huong Cake

## Muc luc
1. [Khoi tao Project & Cau truc thu muc](#1-khoi-tao-project--cau-truc-thu-muc)
2. [Thiet ke Database (18 bang)](#2-thiet-ke-database---18-bang)
3. [Eloquent Models](#3-eloquent-models)
4. [Filament Admin Panel](#4-filament-admin-panel)
5. [Chuyen HTML sang Blade Templates](#5-chuyen-html-sang-blade-templates)
6. [Routes & Controllers](#6-routes--controllers)
7. [Gio hang (Shopping Cart)](#7-gio-hang-shopping-cart)
8. [Quan ly Don hang](#8-quan-ly-don-hang)
9. [Quan ly Anh](#9-quan-ly-anh)
10. [Authentication](#10-authentication)
11. [Database Seeding](#11-database-seeding)
12. [Deployment](#12-deployment)

---

## 1. Khoi tao Project & Cau truc thu muc

### 1.1 Khoi tao Laravel

```bash
composer create-project laravel/laravel thu-huong-cake
cd thu-huong-cake
```

### 1.2 Cai dat Packages

```bash
composer require filament/filament:"^3.0"
composer require spatie/laravel-medialibrary:"^11.0"
composer require darryldecode/cart:"^4.0"
composer require spatie/laravel-sluggable:"^3.0"
composer require spatie/laravel-permission:"^6.0"
```

### 1.3 Cau truc thu muc muc tieu

```
thu-huong-cake/
├── app/
│   ├── Filament/
│   │   ├── Resources/
│   │   │   ├── ProductResource.php
│   │   │   ├── ProductResource/Pages/ (Create, Edit, List)
│   │   │   ├── CategoryResource.php
│   │   │   ├── OrderResource.php
│   │   │   ├── BlogPostResource.php
│   │   │   ├── StoreLocationResource.php
│   │   │   ├── BannerResource.php
│   │   │   ├── ContactMessageResource.php
│   │   │   ├── CakeSizeResource.php
│   │   │   ├── CakeBaseResource.php
│   │   │   ├── PageResource.php
│   │   │   └── HeroSlideResource.php
│   │   └── Widgets/
│   │       ├── StatsOverview.php
│   │       ├── LatestOrders.php
│   │       └── RevenueChart.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── ProductController.php
│   │   │   ├── BlogController.php
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php
│   │   │   ├── StoreController.php
│   │   │   ├── PageController.php
│   │   │   ├── ContactController.php
│   │   │   ├── SearchController.php
│   │   │   └── Auth/
│   │   │       ├── LoginController.php
│   │   │       └── RegisterController.php
│   │   └── Requests/
│   │       ├── CheckoutRequest.php
│   │       └── ContactRequest.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── Order.php
│   │   ├── OrderItem.php
│   │   ├── BlogPost.php
│   │   ├── BlogCategory.php
│   │   ├── StoreLocation.php
│   │   ├── Banner.php
│   │   ├── HeroSlide.php
│   │   ├── ContactMessage.php
│   │   ├── CakeSize.php
│   │   ├── CakeBase.php
│   │   ├── Page.php
│   │   ├── Setting.php
│   │   └── CallbackRequest.php
│   └── View/Components/
│       ├── TopBar.php
│       ├── MainHeader.php
│       ├── MainNav.php
│       ├── MobileDrawer.php
│       ├── Footer.php
│       ├── ProductCard.php
│       ├── BlogCard.php
│       ├── Breadcrumb.php
│       ├── SidebarCategories.php
│       ├── SidebarContact.php
│       ├── SidebarRecentlyViewed.php
│       ├── CartDrawer.php
│       ├── LoginModal.php
│       └── Lightbox.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── components/
│       │   ├── top-bar.blade.php
│       │   ├── main-header.blade.php
│       │   ├── main-nav.blade.php
│       │   ├── mobile-drawer.blade.php
│       │   ├── footer.blade.php
│       │   ├── product-card.blade.php
│       │   ├── blog-card.blade.php
│       │   ├── breadcrumb.blade.php
│       │   ├── sidebar-categories.blade.php
│       │   ├── sidebar-contact.blade.php
│       │   ├── sidebar-recently-viewed.blade.php
│       │   ├── cart-drawer.blade.php
│       │   ├── login-modal.blade.php
│       │   └── lightbox.blade.php
│       ├── pages/
│       │   ├── home.blade.php
│       │   ├── products/
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   ├── blog/
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   ├── about.blade.php
│       │   ├── guide.blade.php
│       │   ├── stores.blade.php
│       │   ├── contact.blade.php
│       │   ├── checkout.blade.php
│       │   └── static-page.blade.php
│       └── auth/
│           ├── login.blade.php
│           └── register.blade.php
├── public/
│   ├── css/styles.css          (copy tu frontend hien tai)
│   ├── js/script.js            (copy tu frontend hien tai)
│   ├── images/
│   ├── image_san_pham/
│   └── storage -> ../storage/app/public (symlink)
└── database/
    ├── migrations/
    └── seeders/
```

### 1.4 Di chuyen Static Assets

- Copy `styles.css` -> `public/css/styles.css`
- Copy `script.js` -> `public/js/script.js`
- Copy `images/` va `image_san_pham/` -> `public/`
- Sau nay co the tich hop vao Vite pipeline

---

## 2. Thiet ke Database - 18 bang

### 2.1 `categories` - Danh muc banh

```php
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');                    // "Banh Sinh Nhat Mini"
    $table->string('slug')->unique();          // "banh-sinh-nhat-mini"
    $table->unsignedBigInteger('parent_id')->nullable();  // tu tham chieu cho danh muc con
    $table->text('description')->nullable();
    $table->string('image')->nullable();
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->boolean('show_in_menu')->default(true);
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->timestamps();

    $table->foreign('parent_id')->references('id')->on('categories')->nullOnDelete();
});
```

### 2.2 `cake_sizes` - Kich thuoc banh

```php
Schema::create('cake_sizes', function (Blueprint $table) {
    $table->id();
    $table->string('name');           // "16cm", "18cm", "20cm"
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 2.3 `cake_bases` - Cot banh

```php
Schema::create('cake_bases', function (Blueprint $table) {
    $table->id();
    $table->string('name');           // "Gato Vani Nhan Viet Quat", "Gato Red Velvet"
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 2.4 `products` - San pham

```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name');                    // "Banh kem viet quat tuoi mat"
    $table->string('slug')->unique();
    $table->unsignedBigInteger('category_id')->nullable();
    $table->decimal('price', 12, 0);          // 160000 (VND, khong so le)
    $table->decimal('sale_price', 12, 0)->nullable();
    $table->text('short_description')->nullable();
    $table->longText('description')->nullable(); // Rich content voi hinh anh
    $table->string('sku')->nullable()->unique();
    $table->integer('stock_quantity')->default(0);
    $table->enum('stock_status', ['in_stock', 'out_of_stock', 'pre_order'])->default('in_stock');
    $table->boolean('is_active')->default(true);
    $table->boolean('is_featured')->default(false);
    $table->boolean('is_hot')->default(false);      // tag "Hot"
    $table->boolean('is_new')->default(false);
    $table->integer('view_count')->default(0);
    $table->integer('sort_order')->default(0);
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->timestamps();
    $table->softDeletes();

    $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
});
```

### 2.5 `product_cake_size` (pivot)

```php
Schema::create('product_cake_size', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('product_id');
    $table->unsignedBigInteger('cake_size_id');
    $table->decimal('price_adjustment', 12, 0)->default(0); // phu phi cho size lon hon
    $table->timestamps();

    $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    $table->foreign('cake_size_id')->references('id')->on('cake_sizes')->cascadeOnDelete();
});
```

### 2.6 `product_cake_base` (pivot)

```php
Schema::create('product_cake_base', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('product_id');
    $table->unsignedBigInteger('cake_base_id');
    $table->timestamps();

    $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
    $table->foreign('cake_base_id')->references('id')->on('cake_bases')->cascadeOnDelete();
});
```

### 2.7 `product_images` - Anh san pham

```php
Schema::create('product_images', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('product_id');
    $table->string('image_path');
    $table->string('alt_text')->nullable();
    $table->boolean('is_primary')->default(false);
    $table->integer('sort_order')->default(0);
    $table->timestamps();

    $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
});
```

### 2.8 `orders` - Don hang

```php
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->string('order_number')->unique();    // THC-20260326-0001
    $table->unsignedBigInteger('user_id')->nullable();

    // Nguoi dat
    $table->string('customer_name');
    $table->string('customer_phone');
    $table->string('customer_email')->nullable();

    // Thoi gian nhan banh
    $table->datetime('delivery_datetime');

    // Ghi chu
    $table->text('note')->nullable();            // "Viet loi chuc len banh, it ngot..."

    // Qua tang
    $table->boolean('is_gift')->default(false);
    $table->string('recipient_name')->nullable();
    $table->string('recipient_phone')->nullable();

    // Hinh thuc nhan hang
    $table->enum('delivery_method', ['ship', 'pickup'])->default('ship');

    // Giao tan noi
    $table->string('city')->nullable();
    $table->string('district')->nullable();
    $table->string('ward')->nullable();
    $table->string('address')->nullable();

    // Nhan tai cua hang
    $table->unsignedBigInteger('pickup_store_id')->nullable();

    // Thanh toan
    $table->enum('payment_method', ['bank_transfer', 'cod'])->default('cod');
    $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');

    // Tong tien
    $table->decimal('subtotal', 12, 0);
    $table->decimal('shipping_fee', 12, 0)->default(0);
    $table->decimal('discount', 12, 0)->default(0);
    $table->decimal('total', 12, 0);

    // Trang thai
    $table->enum('status', [
        'pending',       // Cho xu ly
        'confirmed',     // Da xac nhan
        'processing',    // Dang lam banh
        'shipping',      // Dang giao
        'delivered',     // Da giao
        'completed',     // Hoan thanh
        'cancelled',     // Da huy
    ])->default('pending');

    $table->text('cancel_reason')->nullable();
    $table->text('admin_note')->nullable();

    $table->timestamps();
    $table->softDeletes();

    $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
    $table->foreign('pickup_store_id')->references('id')->on('store_locations')->nullOnDelete();
});
```

### 2.9 `order_items` - Chi tiet don hang

```php
Schema::create('order_items', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('order_id');
    $table->unsignedBigInteger('product_id')->nullable();
    $table->string('product_name');             // snapshot tai thoi diem dat
    $table->string('product_image')->nullable();
    $table->string('cake_size')->nullable();    // "16cm"
    $table->string('cake_base')->nullable();    // "Gato Vani Nhan Viet Quat"
    $table->integer('quantity');
    $table->decimal('unit_price', 12, 0);
    $table->decimal('total_price', 12, 0);
    $table->timestamps();

    $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
    $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
});
```

### 2.10 `blog_categories` - Danh muc blog

```php
Schema::create('blog_categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');           // "Cam nang lam banh", "Mau banh kem", "Tin tuc"
    $table->string('slug')->unique();
    $table->integer('sort_order')->default(0);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

### 2.11 `blog_posts` - Bai viet

```php
Schema::create('blog_posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->unsignedBigInteger('blog_category_id')->nullable();
    $table->unsignedBigInteger('author_id')->nullable();
    $table->string('featured_image')->nullable();
    $table->text('excerpt')->nullable();
    $table->longText('content');
    $table->integer('view_count')->default(0);
    $table->boolean('is_published')->default(false);
    $table->datetime('published_at')->nullable();
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->timestamps();
    $table->softDeletes();

    $table->foreign('blog_category_id')->references('id')->on('blog_categories')->nullOnDelete();
    $table->foreign('author_id')->references('id')->on('users')->nullOnDelete();
});
```

### 2.12 `store_locations` - Cua hang

```php
Schema::create('store_locations', function (Blueprint $table) {
    $table->id();
    $table->string('name');                // "CS1: 11A Pho Dich Vong"
    $table->string('short_name')->nullable(); // "Co so 1"
    $table->string('address');
    $table->string('city');                // "Ha Noi" hoac "TP Ho Chi Minh"
    $table->string('district')->nullable();
    $table->string('phone');
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();
    $table->string('google_maps_url')->nullable();
    $table->boolean('is_active')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

### 2.13 `hero_slides` - Slider trang chu

```php
Schema::create('hero_slides', function (Blueprint $table) {
    $table->id();
    $table->string('badge_text');          // "Thu Huong Cake", "Dac Biet", "Freeship 3km"
    $table->string('title_line1');         // "Banh Sinh Nhat"
    $table->string('title_line2');         // "Tuoi Ngon Moi Ngay"
    $table->text('description');
    $table->string('button1_text');        // "Dat Banh Ngay"
    $table->string('button1_url');         // "/san-pham"
    $table->string('button2_text')->nullable();
    $table->string('button2_url')->nullable();
    $table->string('image');
    $table->boolean('is_active')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

### 2.14 `banners`

```php
Schema::create('banners', function (Blueprint $table) {
    $table->id();
    $table->string('title')->nullable();
    $table->string('image');
    $table->string('url')->nullable();
    $table->string('position');            // 'home_feature', 'sidebar', 'popup'
    $table->boolean('is_active')->default(true);
    $table->integer('sort_order')->default(0);
    $table->timestamps();
});
```

### 2.15 `contact_messages` - Lien he

```php
Schema::create('contact_messages', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('organization')->nullable();
    $table->string('address')->nullable();
    $table->string('phone');
    $table->string('email')->nullable();
    $table->text('message');
    $table->boolean('is_read')->default(false);
    $table->text('admin_reply')->nullable();
    $table->timestamps();
});
```

### 2.16 `callback_requests` - Yeu cau goi lai

```php
Schema::create('callback_requests', function (Blueprint $table) {
    $table->id();
    $table->string('phone');
    $table->unsignedBigInteger('product_id')->nullable();
    $table->boolean('is_processed')->default(false);
    $table->text('admin_note')->nullable();
    $table->timestamps();

    $table->foreign('product_id')->references('id')->on('products')->nullOnDelete();
});
```

### 2.17 `pages` - Trang tinh (Gioi thieu, Huong dan, chinh sach...)

```php
Schema::create('pages', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->longText('content');
    $table->string('layout')->default('default');  // 'default', 'sidebar', 'full-width'
    $table->boolean('is_published')->default(true);
    $table->string('meta_title')->nullable();
    $table->text('meta_description')->nullable();
    $table->timestamps();
});
```

### 2.18 `settings` - Cai dat

```php
Schema::create('settings', function (Blueprint $table) {
    $table->id();
    $table->string('key')->unique();
    $table->text('value')->nullable();
    $table->string('group')->default('general');  // general, contact, shipping, social
    $table->timestamps();
});
```

**Cac key settings can seed:**
`site_name`, `hotline`, `email`, `opening_hours`, `logo`, `facebook_url`, `zalo_url`, `tiktok_url`, `instagram_url`, `youtube_url`, `address_hanoi`, `address_hcm`, `business_license`, `shipping_fee_default`, `free_shipping_distance_km`, `free_shipping_min_order`

---

## 3. Eloquent Models

### 3.1 Product Model

```php
class Product extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'name', 'slug', 'category_id', 'price', 'sale_price',
        'short_description', 'description', 'sku', 'stock_quantity',
        'stock_status', 'is_active', 'is_featured', 'is_hot', 'is_new',
        'view_count', 'sort_order', 'meta_title', 'meta_description',
    ];

    protected $casts = [
        'price' => 'integer',
        'sale_price' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_hot' => 'boolean',
        'is_new' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function sizes(): BelongsToMany
    {
        return $this->belongsToMany(CakeSize::class, 'product_cake_size')
            ->withPivot('price_adjustment')
            ->withTimestamps();
    }

    public function bases(): BelongsToMany
    {
        return $this->belongsToMany(CakeBase::class, 'product_cake_base')
            ->withTimestamps();
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getDisplayPriceAttribute(): string
    {
        return number_format($this->sale_price ?? $this->price, 0, ',', '.') . 'd';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
```

### 3.2 Category Model

```php
class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'image',
        'sort_order', 'is_active', 'show_in_menu', 'meta_title', 'meta_description',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('sort_order');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
```

### 3.3 Order Model

```php
class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_number', 'user_id', 'customer_name', 'customer_phone', 'customer_email',
        'delivery_datetime', 'note', 'is_gift', 'recipient_name', 'recipient_phone',
        'delivery_method', 'city', 'district', 'ward', 'address',
        'pickup_store_id', 'payment_method', 'payment_status',
        'subtotal', 'shipping_fee', 'discount', 'total',
        'status', 'cancel_reason', 'admin_note',
    ];

    protected $casts = [
        'delivery_datetime' => 'datetime',
        'is_gift' => 'boolean',
        'subtotal' => 'integer',
        'shipping_fee' => 'integer',
        'discount' => 'integer',
        'total' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function pickupStore(): BelongsTo
    {
        return $this->belongsTo(StoreLocation::class, 'pickup_store_id');
    }

    // Tu dong tao ma don hang
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_number = 'THC-' . now()->format('Ymd') . '-'
                . str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
}
```

### 3.4 OrderItem Model

```php
class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'product_image',
        'cake_size', 'cake_base', 'quantity', 'unit_price', 'total_price',
    ];

    protected $casts = [
        'unit_price' => 'integer',
        'total_price' => 'integer',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
```

### 3.5 BlogPost Model

```php
class BlogPost extends Model
{
    use HasFactory, SoftDeletes, HasSlug;

    protected $fillable = [
        'title', 'slug', 'blog_category_id', 'author_id',
        'featured_image', 'excerpt', 'content', 'view_count',
        'is_published', 'published_at', 'meta_title', 'meta_description',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
```

### 3.6 Cac Models khac

**StoreLocation**, **HeroSlide**, **Banner**, **ContactMessage**, **CallbackRequest**, **CakeSize**, **CakeBase**, **Page**, **Setting**, **BlogCategory**, **ProductImage** -- moi model co `$fillable`, `$casts`, va relationships tuong ung voi migrations o tren.

---

## 4. Filament Admin Panel

### 4.1 Setup

```bash
php artisan filament:install --panels
```

Admin panel URL: `/admin`

Trong `app/Providers/Filament/AdminPanelProvider.php`:
- `brandName`: `'Thu Huong Cake Admin'`
- `brandLogo`: duong dan logo
- Colors: primary `Color::hex('#e84393')`
- Locale: Vietnamese

### 4.2 ProductResource - Quan ly San pham

**Bang danh sach (Table columns):**

```php
Tables\Columns\ImageColumn::make('primaryImage.image_path')
    ->label('Anh')
    ->square(),
Tables\Columns\TextColumn::make('name')
    ->label('Ten san pham')
    ->searchable()
    ->sortable()
    ->limit(40),
Tables\Columns\TextColumn::make('category.name')
    ->label('Danh muc')
    ->sortable(),
Tables\Columns\TextColumn::make('price')
    ->label('Gia')
    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.') . 'd')
    ->sortable(),
Tables\Columns\TextColumn::make('sale_price')
    ->label('Gia KM')
    ->formatStateUsing(fn ($state) => $state ? number_format($state, 0, ',', '.') . 'd' : '-'),
Tables\Columns\IconColumn::make('is_active')
    ->label('Hien thi')
    ->boolean(),
Tables\Columns\IconColumn::make('is_hot')
    ->label('Hot')
    ->boolean(),
Tables\Columns\TextColumn::make('stock_status')
    ->label('Trang thai kho')
    ->badge()
    ->color(fn (string $state): string => match ($state) {
        'in_stock' => 'success',
        'out_of_stock' => 'danger',
        'pre_order' => 'warning',
    }),
Tables\Columns\TextColumn::make('view_count')
    ->label('Luot xem')
    ->sortable(),
Tables\Columns\TextColumn::make('created_at')
    ->label('Ngay tao')
    ->dateTime('d/m/Y')
    ->sortable(),
```

**Bo loc (Table filters):**

```php
Tables\Filters\SelectFilter::make('category_id')
    ->label('Danh muc')
    ->relationship('category', 'name'),
Tables\Filters\TernaryFilter::make('is_active')
    ->label('Trang thai'),
Tables\Filters\TernaryFilter::make('is_hot')
    ->label('San pham Hot'),
Tables\Filters\SelectFilter::make('stock_status')
    ->label('Tinh trang kho')
    ->options([
        'in_stock' => 'Con hang',
        'out_of_stock' => 'Het hang',
        'pre_order' => 'Dat truoc',
    ]),
```

**Form (Them/Sua san pham):**

```php
// Section 1: Thong tin co ban
Forms\Components\Section::make('Thong tin co ban')
    ->schema([
        Forms\Components\TextInput::make('name')
            ->label('Ten san pham')
            ->required()
            ->maxLength(255)
            ->live(onBlur: true)
            ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
        Forms\Components\TextInput::make('slug')
            ->label('Duong dan')
            ->required()
            ->unique(ignoreRecord: true),
        Forms\Components\Select::make('category_id')
            ->label('Danh muc')
            ->relationship('category', 'name')
            ->searchable()
            ->preload()
            ->required(),
        Forms\Components\TextInput::make('sku')
            ->label('Ma san pham')
            ->unique(ignoreRecord: true),
    ])->columns(2),

// Section 2: Gia & Kho hang
Forms\Components\Section::make('Gia & Kho hang')
    ->schema([
        Forms\Components\TextInput::make('price')
            ->label('Gia (VND)')
            ->required()
            ->numeric()
            ->suffix('d'),
        Forms\Components\TextInput::make('sale_price')
            ->label('Gia khuyen mai (VND)')
            ->numeric()
            ->suffix('d'),
        Forms\Components\TextInput::make('stock_quantity')
            ->label('So luong ton kho')
            ->numeric()
            ->default(0),
        Forms\Components\Select::make('stock_status')
            ->label('Tinh trang')
            ->options([
                'in_stock' => 'Con banh',
                'out_of_stock' => 'Het banh',
                'pre_order' => 'Dat truoc',
            ])
            ->default('in_stock'),
    ])->columns(2),

// Section 3: Tuy chon banh
Forms\Components\Section::make('Tuy chon banh')
    ->schema([
        Forms\Components\Select::make('sizes')
            ->label('Kich thuoc')
            ->relationship('sizes', 'name')
            ->multiple()
            ->preload(),
        Forms\Components\Select::make('bases')
            ->label('Cot banh')
            ->relationship('bases', 'name')
            ->multiple()
            ->preload(),
    ])->columns(2),

// Section 4: Hinh anh
Forms\Components\Section::make('Hinh anh')
    ->schema([
        Forms\Components\Repeater::make('images')
            ->label('Hinh anh san pham')
            ->relationship()
            ->schema([
                Forms\Components\FileUpload::make('image_path')
                    ->label('Hinh anh')
                    ->image()
                    ->directory('products')
                    ->required(),
                Forms\Components\TextInput::make('alt_text')
                    ->label('Mo ta anh'),
                Forms\Components\Toggle::make('is_primary')
                    ->label('Anh chinh'),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Thu tu')
                    ->numeric()
                    ->default(0),
            ])->columns(2)
            ->defaultItems(1)
            ->collapsible(),
    ]),

// Section 5: Mo ta
Forms\Components\Section::make('Mo ta')
    ->schema([
        Forms\Components\Textarea::make('short_description')
            ->label('Mo ta ngan')
            ->rows(3),
        Forms\Components\RichEditor::make('description')
            ->label('Mo ta chi tiet')
            ->fileAttachmentsDisk('public')
            ->fileAttachmentsDirectory('products/content'),
    ]),

// Section 6: Hien thi & SEO
Forms\Components\Section::make('Hien thi & SEO')
    ->schema([
        Forms\Components\Toggle::make('is_active')->label('Hien thi')->default(true),
        Forms\Components\Toggle::make('is_featured')->label('Noi bat'),
        Forms\Components\Toggle::make('is_hot')->label('Hot'),
        Forms\Components\Toggle::make('is_new')->label('Moi'),
        Forms\Components\TextInput::make('sort_order')->label('Thu tu sap xep')->numeric()->default(0),
        Forms\Components\TextInput::make('meta_title')->label('Meta Title'),
        Forms\Components\Textarea::make('meta_description')->label('Meta Description'),
    ])->columns(2),
```

### 4.3 CategoryResource - Quan ly Danh muc

**Table columns:** id, name (searchable), slug, parent.name ("Danh muc cha"), products_count (withCount), is_active (boolean), show_in_menu (boolean), sort_order

**Form fields:** name (required), slug (auto-generated), parent_id (Select, tu tham chieu, loai tru chinh no), description (Textarea), image (FileUpload, directory: 'categories'), sort_order (numeric), is_active (Toggle), show_in_menu (Toggle), meta_title, meta_description

### 4.4 OrderResource - Quan ly Don hang

**Table columns:**

```php
Tables\Columns\TextColumn::make('order_number')->label('Ma don')->searchable()->sortable(),
Tables\Columns\TextColumn::make('customer_name')->label('Khach hang')->searchable(),
Tables\Columns\TextColumn::make('customer_phone')->label('SDT')->searchable(),
Tables\Columns\TextColumn::make('total')
    ->label('Tong tien')
    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.') . 'd')
    ->sortable(),
Tables\Columns\BadgeColumn::make('status')
    ->label('Trang thai')
    ->colors([
        'warning' => 'pending',
        'info' => 'confirmed',
        'primary' => 'processing',
        'secondary' => 'shipping',
        'success' => fn ($state) => in_array($state, ['delivered', 'completed']),
        'danger' => 'cancelled',
    ])
    ->formatStateUsing(fn ($state) => match($state) {
        'pending' => 'Cho xu ly',
        'confirmed' => 'Da xac nhan',
        'processing' => 'Dang lam banh',
        'shipping' => 'Dang giao',
        'delivered' => 'Da giao',
        'completed' => 'Hoan thanh',
        'cancelled' => 'Da huy',
    }),
Tables\Columns\TextColumn::make('delivery_method')
    ->label('Hinh thuc')
    ->formatStateUsing(fn ($state) => $state === 'ship' ? 'Giao tan noi' : 'Nhan tai CH'),
Tables\Columns\TextColumn::make('payment_method')
    ->label('Thanh toan')
    ->formatStateUsing(fn ($state) => $state === 'bank_transfer' ? 'Chuyen khoan' : 'COD'),
Tables\Columns\TextColumn::make('delivery_datetime')
    ->label('Thoi gian nhan')
    ->dateTime('d/m/Y H:i')
    ->sortable(),
Tables\Columns\TextColumn::make('created_at')
    ->label('Ngay dat')
    ->dateTime('d/m/Y H:i')
    ->sortable(),
```

**Bo loc:** status, delivery_method, payment_method, payment_status, created_at (date range)

**Nut hanh dong tren moi don:**

```php
Tables\Actions\Action::make('confirm')
    ->label('Xac nhan')
    ->icon('heroicon-o-check-circle')
    ->color('success')
    ->visible(fn ($record) => $record->status === 'pending')
    ->action(fn ($record) => $record->update(['status' => 'confirmed'])),

Tables\Actions\Action::make('start_processing')
    ->label('Bat dau lam banh')
    ->icon('heroicon-o-cake')
    ->visible(fn ($record) => $record->status === 'confirmed')
    ->action(fn ($record) => $record->update(['status' => 'processing'])),

Tables\Actions\Action::make('ship')
    ->label('Giao hang')
    ->icon('heroicon-o-truck')
    ->visible(fn ($record) => $record->status === 'processing')
    ->action(fn ($record) => $record->update(['status' => 'shipping'])),

Tables\Actions\Action::make('complete')
    ->label('Hoan thanh')
    ->icon('heroicon-o-check-badge')
    ->visible(fn ($record) => in_array($record->status, ['shipping', 'delivered']))
    ->action(fn ($record) => $record->update(['status' => 'completed'])),

Tables\Actions\Action::make('cancel')
    ->label('Huy don')
    ->icon('heroicon-o-x-circle')
    ->color('danger')
    ->visible(fn ($record) => !in_array($record->status, ['completed', 'cancelled']))
    ->requiresConfirmation()
    ->form([
        Forms\Components\Textarea::make('cancel_reason')->label('Ly do huy')->required(),
    ])
    ->action(fn ($record, array $data) => $record->update([
        'status' => 'cancelled',
        'cancel_reason' => $data['cancel_reason'],
    ])),
```

### 4.5 BlogPostResource

**Table columns:** featured_image (ImageColumn), title (searchable, limit 50), category.name, author.name, is_published (IconColumn), view_count (sortable), published_at (date d/m/Y), created_at

**Form fields:** title (TextInput), slug (auto-generated), blog_category_id (Select), author_id (Select), featured_image (FileUpload, directory: 'blog'), excerpt (Textarea), content (RichEditor voi file uploads), is_published (Toggle), published_at (DateTimePicker), meta_title, meta_description

### 4.6 StoreLocationResource

**Table:** name, address, city, phone, is_active, sort_order
**Form:** name, short_name, address, city (Select: Ha Noi/TP HCM), district, phone, latitude, longitude, google_maps_url, is_active, sort_order

### 4.7 HeroSlideResource

**Table:** image (ImageColumn), badge_text, title_line1, is_active, sort_order
**Form:** badge_text, title_line1, title_line2, description, button1_text, button1_url, button2_text, button2_url, image (FileUpload, directory: 'heroes'), is_active, sort_order

### 4.8 BannerResource

**Table:** image, title, position, is_active, sort_order
**Form:** title, image (FileUpload, directory: 'banners'), url, position (Select: home_feature, sidebar, popup), is_active, sort_order

### 4.9 ContactMessageResource

**Table:** name, phone, email, message (limit 50), is_read (IconColumn), created_at
**Chi xem (View page only)** - Tin nhan den tu frontend. Admin co the danh dau da doc va viet tra loi.

### 4.10 PageResource

**Table:** title, slug, layout, is_published, updated_at
**Form:** title, slug, content (RichEditor), layout (Select), is_published, meta_title, meta_description

### 4.11 Settings Page (Trang cai dat)

Tao custom Filament page `app/Filament/Pages/ManageSettings.php` voi cac nhom:
- **Chung:** site_name, logo (FileUpload), hotline, email, opening_hours
- **Van chuyen:** shipping_fee_default, free_shipping_distance_km, free_shipping_min_order
- **Mang xa hoi:** facebook_url, zalo_url, tiktok_url, instagram_url, youtube_url
- **Doanh nghiep:** address_hanoi, address_hcm, business_license

### 4.12 Dashboard Widgets

**StatsOverview:**
- Tong don hom nay, Doanh thu hom nay, Tong san pham, Don cho xu ly

**LatestOrders:**
- Bang hien thi 10 don hang moi nhat (order_number, customer_name, total, status)

**RevenueChart:**
- Bieu do duong doanh thu 30 ngay gan nhat

---

## 5. Chuyen HTML sang Blade Templates

### 5.1 Master Layout: `resources/views/layouts/app.blade.php`

```html
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Thu Huong Cake - Banh Sinh Nhat Dep & Ngon')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>
<body>
    <x-top-bar />
    <div class="sticky-wrapper">
        <x-main-header />
        <x-main-nav />
    </div>
    <x-mobile-drawer />

    @yield('content')

    <x-footer />
    <x-lightbox />
    <x-login-modal />
    <x-cart-drawer />

    <!-- Back to top -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
```

### 5.2 Component: `top-bar.blade.php`

```html
<div class="top-bar">
    <div class="container">
        <div class="top-bar-content">
            <div class="top-bar-left">
                <span><i class="fas fa-phone-alt"></i> Hotline: {{ setting('hotline', '0962.849.989') }}</span>
                <span><i class="fas fa-clock"></i> {{ setting('opening_hours', '07:00 - 23:00') }}</span>
            </div>
            <div class="top-bar-right">
                <span><i class="fas fa-envelope"></i> {{ setting('email', 'donhang@thuhuongcake.vn') }}</span>
            </div>
        </div>
    </div>
</div>
```

### 5.3 Component: `main-nav.blade.php`

```html
@php
    $menuCategories = \App\Models\Category::where('is_active', true)
        ->where('show_in_menu', true)
        ->whereNull('parent_id')
        ->orderBy('sort_order')
        ->get();
@endphp
<nav class="main-nav">
    <div class="container">
        <div class="nav-content">
            <div class="nav-category-wrapper">
                <div class="nav-category-btn">
                    <i class="fas fa-bars"></i>
                    <span>Danh muc banh sinh nhat</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="nav-category-dropdown">
                    @foreach($menuCategories as $cat)
                        <a href="{{ route('products.index', ['category' => $cat->slug]) }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}" @class(['active' => request()->routeIs('home')])>Trang chu</a></li>
                <li><a href="{{ route('about') }}" @class(['active' => request()->routeIs('about')])>Ve chung toi</a></li>
                <li><a href="{{ route('products.index') }}" @class(['active' => request()->routeIs('products.*')])>Banh sinh nhat</a></li>
                <li><a href="{{ route('guide') }}" @class(['active' => request()->routeIs('guide')])>Huong dan dat banh</a></li>
                <li><a href="{{ route('blog.index') }}" @class(['active' => request()->routeIs('blog.*')])>Blog</a></li>
                <li><a href="{{ route('stores') }}" @class(['active' => request()->routeIs('stores')])>Cua hang</a></li>
            </ul>
        </div>
    </div>
</nav>
```

### 5.4 Component: `product-card.blade.php`

```html
@props(['product'])
<div class="product-card" style="cursor:pointer"
     onclick="window.location='{{ route('products.show', $product) }}'">
    <div class="product-image">
        <img src="{{ $product->primaryImage
            ? asset('storage/' . $product->primaryImage->image_path)
            : asset('images/placeholder.jpg') }}"
             alt="{{ $product->name }}">
        @if($product->is_hot)
            <span class="product-tag">Hot</span>
        @elseif($product->is_new)
            <span class="product-tag">Moi</span>
        @endif
        <div class="product-overlay">
            <button class="quick-view" onclick="event.stopPropagation()">
                <i class="fas fa-eye"></i>
            </button>
            <button class="add-cart"
                    onclick="event.stopPropagation(); addToCart({{ $product->id }})">
                <i class="fas fa-shopping-cart"></i>
            </button>
        </div>
    </div>
    <div class="product-info">
        <h3>{{ $product->name }}</h3>
        @if($product->sale_price)
            <span class="product-price product-price--sale">{{ $product->display_price }}</span>
            <span class="product-price product-price--original">
                {{ number_format($product->price, 0, ',', '.') }}d
            </span>
        @else
            <span class="product-price">{{ $product->display_price }}</span>
        @endif
    </div>
</div>
```

### 5.5 Component: `sidebar-categories.blade.php`

```html
@props(['activeSlug' => null])
@php
    $allCategories = \App\Models\Category::where('is_active', true)
        ->whereNull('parent_id')
        ->orderBy('sort_order')
        ->get();
@endphp
<div class="sidebar-box">
    <h3 class="sidebar-title">Danh Muc San Pham</h3>
    <ul class="sidebar-categories">
        @foreach($allCategories as $cat)
            <li>
                <a href="{{ route('products.index', ['category' => $cat->slug]) }}"
                   @class(['active' => $activeSlug === $cat->slug])>
                    <i class="fas fa-chevron-right"></i> {{ $cat->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
```

### 5.6 Component: `footer.blade.php`

Lay du lieu tu bang `settings` va `store_locations`. Cung HTML structure nhu footer hien tai nhung dung `{{ setting('key') }}` va `{{ route('name') }}`.

### 5.7 Trang chu: `pages/home.blade.php`

```html
@extends('layouts.app')
@section('title', 'Thu Huong Cake - Banh Sinh Nhat Dep & Ngon')
@section('content')
    {{-- Hero Slider --}}
    <section class="hero">
        <div class="hero-slider" id="heroSlider">
            @foreach($heroSlides as $slide)
            <div class="hero-slide @if($loop->first) active @endif">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <span class="hero-badge">{{ $slide->badge_text }}</span>
                            <h1>{{ $slide->title_line1 }}<br>
                                <span>{{ $slide->title_line2 }}</span>
                            </h1>
                            <p>{{ $slide->description }}</p>
                            <div class="hero-buttons">
                                <a href="{{ $slide->button1_url }}" class="btn btn-primary">
                                    {{ $slide->button1_text }}
                                </a>
                                @if($slide->button2_text)
                                <a href="{{ $slide->button2_url }}" class="btn btn-outline">
                                    {{ $slide->button2_text }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="hero-image">
                            <img src="{{ asset('storage/' . $slide->image) }}"
                                 alt="{{ $slide->title_line1 }}" class="hero-img">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Feature Banners --}}
    <section class="feature-banners">
        <div class="container">
            <div class="banners-grid">
                @foreach($featureBanners as $banner)
                <a href="{{ $banner->url ?? route('products.index') }}" class="banner-card">
                    <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}">
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- San pham theo tung danh muc --}}
    @foreach($homeSections as $section)
    <section class="products-section @if($loop->iteration % 2 === 0) alt-bg @endif">
        <div class="container">
            <div class="section-header">
                <div class="section-title-group">
                    <span class="section-label">{{ $section['label'] }}</span>
                    <h2 class="section-title">{{ $section['category']->name }}</h2>
                </div>
                <a href="{{ route('products.index', ['category' => $section['category']->slug]) }}"
                   class="view-all-btn">
                    Xem toan bo <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="products-grid">
                @foreach($section['products'] as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
    @endforeach

    {{-- Blog --}}
    <section class="blog-section">
        ...dynamic tu $latestPosts...
    </section>
@endsection
```

### 5.8 Trang san pham: `pages/products/index.blade.php`

Cung cau truc nhu `products.html` hien tai nhung voi:
- Sidebar dong: `<x-sidebar-categories :activeSlug="$currentCategory?->slug" />`
- `<x-sidebar-contact />`, `<x-sidebar-recently-viewed />`
- Products grid tu `$products` (co phan trang)
- Sap xep qua URL query: `?sort=price_desc`
- Phan trang: `{{ $products->links() }}`

### 5.9 Trang chi tiet: `pages/products/show.blade.php`

Cung nhu `product-detail.html` nhung voi:
- Du lieu dong tu `$product`
- Gallery tu `$product->images`
- Sizes tu `$product->sizes`, Bases tu `$product->bases`
- San pham lien quan tu `$relatedProducts`
- Form them gio hang voi CSRF va AJAX
- Form yeu cau goi lai (AJAX POST den `/yeu-cau-goi-lai`)

### 5.10 Cac trang khac

Moi trang theo cung pattern: trich xuat noi dung `<section>` tu HTML tinh, thay data cung bang Blade variables/loops, boc trong `@extends('layouts.app')`.

---

## 6. Routes & Controllers

### 6.1 Dinh nghia Routes (`routes/web.php`)

```php
// Trang chu
Route::get('/', [HomeController::class, 'index'])->name('home');

// Trang tinh
Route::get('/ve-chung-toi', [PageController::class, 'about'])->name('about');
Route::get('/huong-dan-dat-banh', [PageController::class, 'guide'])->name('guide');
Route::get('/cua-hang', [StoreController::class, 'index'])->name('stores');
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

// San pham
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// Gio hang (AJAX endpoints)
Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
Route::patch('/gio-hang/cap-nhat', [CartController::class, 'update'])->name('cart.update');
Route::delete('/gio-hang/xoa/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/gio-hang', [CartController::class, 'index'])->name('cart.index');
Route::get('/gio-hang/count', [CartController::class, 'count'])->name('cart.count');

// Thanh toan
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/thanh-toan', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/dat-hang-thanh-cong/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// Tim kiem
Route::get('/tim-kiem', [SearchController::class, 'index'])->name('search');

// Yeu cau goi lai (AJAX)
Route::post('/yeu-cau-goi-lai', [CallbackController::class, 'store'])->name('callback.store');

// Trang tinh (chinh sach, dieu khoan...)
Route::get('/trang/{page:slug}', [PageController::class, 'show'])->name('pages.show');

// Auth
Route::middleware('guest')->group(function () {
    Route::get('/dang-nhap', [LoginController::class, 'showForm'])->name('login');
    Route::post('/dang-nhap', [LoginController::class, 'login']);
    Route::get('/dang-ky', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/dang-ky', [RegisterController::class, 'register']);
});
Route::post('/dang-xuat', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Tai khoan khach hang
Route::middleware('auth')->prefix('tai-khoan')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/don-hang', [AccountController::class, 'orders'])->name('orders');
    Route::get('/don-hang/{order}', [AccountController::class, 'orderDetail'])->name('orders.show');
});
```

### 6.2 Controller Implementations

**HomeController::index()**

```php
public function index()
{
    $heroSlides = HeroSlide::where('is_active', true)->orderBy('sort_order')->get();

    $featureBanners = Banner::where('position', 'home_feature')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    // Cac section trang chu theo danh muc
    $sectionSlugs = [
        ['slug' => 'set-banh-lam-qua', 'label' => 'Bo Suu Tap'],
        ['slug' => 'banh-sinh-nhat-mini', 'label' => 'Nho Xinh'],
        ['slug' => 'banh-sinh-nhat', 'label' => 'Dac Biet'],
    ];

    $homeSections = collect($sectionSlugs)->map(function ($item) {
        $category = Category::where('slug', $item['slug'])->first();
        if (!$category) return null;
        return [
            'label' => $item['label'],
            'category' => $category,
            'products' => $category->products()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->limit(10)
                ->get(),
        ];
    })->filter();

    $latestPosts = BlogPost::where('is_published', true)
        ->orderByDesc('published_at')
        ->limit(3)
        ->get();

    return view('pages.home', compact('heroSlides', 'featureBanners', 'homeSections', 'latestPosts'));
}
```

**ProductController::index()**

```php
public function index(Request $request)
{
    $query = Product::where('is_active', true)->with(['primaryImage', 'category']);

    // Loc theo danh muc
    if ($request->filled('category')) {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $query->where('category_id', $category->id);
    }

    // Sap xep
    $sort = $request->get('sort', 'newest');
    match($sort) {
        'price_asc' => $query->orderBy('price', 'asc'),
        'price_desc' => $query->orderBy('price', 'desc'),
        'popular' => $query->orderBy('view_count', 'desc'),
        'sale' => $query->whereNotNull('sale_price')->orderByRaw('(price - sale_price) DESC'),
        'best_selling' => $query->withCount('orderItems')->orderByDesc('order_items_count'),
        'oldest' => $query->orderBy('created_at', 'asc'),
        default => $query->orderBy('created_at', 'desc'),  // newest
    };

    $products = $query->paginate(20);
    $categories = Category::where('is_active', true)
        ->whereNull('parent_id')
        ->orderBy('sort_order')
        ->get();
    $currentCategory = isset($category) ? $category : null;

    return view('pages.products.index', compact('products', 'categories', 'currentCategory', 'sort'));
}
```

**ProductController::show()**

```php
public function show(Product $product)
{
    $product->increment('view_count');
    $product->load(['images', 'sizes', 'bases', 'category']);

    $relatedProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('is_active', true)
        ->with('primaryImage')
        ->inRandomOrder()
        ->limit(5)
        ->get();

    // Luu vao session "da xem gan day"
    $recentlyViewed = session('recently_viewed', []);
    $recentlyViewed = array_filter($recentlyViewed, fn($id) => $id !== $product->id);
    array_unshift($recentlyViewed, $product->id);
    session(['recently_viewed' => array_slice($recentlyViewed, 0, 10)]);

    return view('pages.products.show', compact('product', 'relatedProducts'));
}
```

**BlogController::index()**

```php
public function index(Request $request)
{
    $query = BlogPost::where('is_published', true)
        ->with('category')
        ->orderByDesc('published_at');

    if ($request->filled('category')) {
        $blogCat = BlogCategory::where('slug', $request->category)->firstOrFail();
        $query->where('blog_category_id', $blogCat->id);
    }

    $posts = $query->paginate(12);
    $blogCategories = BlogCategory::where('is_active', true)->orderBy('sort_order')->get();

    return view('pages.blog.index', compact('posts', 'blogCategories'));
}
```

**BlogController::show()**

```php
public function show(BlogPost $post)
{
    $post->increment('view_count');
    return view('pages.blog.show', compact('post'));
}
```

**ContactController::store()**

```php
public function store(ContactRequest $request)
{
    ContactMessage::create($request->validated());

    if ($request->ajax()) {
        return response()->json(['message' => 'Gui lien he thanh cong!']);
    }
    return back()->with('success', 'Gui lien he thanh cong! Chung toi se phan hoi som nhat.');
}
```

**CheckoutController::store()**

```php
public function store(CheckoutRequest $request)
{
    $cartItems = Cart::session(session()->getId())->getContent();
    if ($cartItems->isEmpty()) {
        return back()->withErrors(['cart' => 'Gio hang trong.']);
    }

    $subtotal = Cart::session(session()->getId())->getSubTotal();
    $shippingFee = $request->delivery_method === 'ship'
        ? $this->calculateShipping($subtotal) : 0;
    $total = $subtotal + $shippingFee;

    $order = Order::create([
        'user_id' => auth()->id(),
        'customer_name' => $request->customer_name,
        'customer_phone' => $request->customer_phone,
        'customer_email' => $request->customer_email,
        'delivery_datetime' => $request->delivery_datetime,
        'note' => $request->note,
        'is_gift' => $request->boolean('is_gift'),
        'recipient_name' => $request->recipient_name,
        'recipient_phone' => $request->recipient_phone,
        'delivery_method' => $request->delivery_method,
        'city' => $request->city,
        'district' => $request->district,
        'ward' => $request->ward,
        'address' => $request->address,
        'pickup_store_id' => $request->pickup_store_id,
        'payment_method' => $request->payment_method,
        'subtotal' => $subtotal,
        'shipping_fee' => $shippingFee,
        'total' => $total,
    ]);

    foreach ($cartItems as $item) {
        $order->items()->create([
            'product_id' => $item->id,
            'product_name' => $item->name,
            'product_image' => $item->attributes->image ?? null,
            'cake_size' => $item->attributes->cake_size ?? null,
            'cake_base' => $item->attributes->cake_base ?? null,
            'quantity' => $item->quantity,
            'unit_price' => $item->price,
            'total_price' => $item->price * $item->quantity,
        ]);
    }

    Cart::session(session()->getId())->clear();

    return redirect()->route('checkout.success', $order);
}

private function calculateShipping(int $subtotal): int
{
    $minForFree = (int) setting('free_shipping_min_order', 300000);
    $defaultFee = (int) setting('shipping_fee_default', 30000);
    return $subtotal >= $minForFree ? 0 : $defaultFee;
}
```

---

## 7. Gio hang (Shopping Cart)

### 7.1 Cach tiep can

Dung package `darryldecode/cart` voi session-based storage (khong can dang nhap). Session ID lam cart identifier.

### 7.2 CartController

```php
class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::session(session()->getId())->getContent()->sortBy('id');
        $subtotal = Cart::session(session()->getId())->getSubTotal();
        return response()->json([
            'items' => $cartItems->values(),
            'count' => $cartItems->sum('quantity'),
            'subtotal' => $subtotal,
            'subtotal_formatted' => number_format($subtotal, 0, ',', '.') . 'd',
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1',
            'cake_size' => 'nullable|string',
            'cake_base' => 'nullable|string',
        ]);

        $product = Product::with('primaryImage')->findOrFail($request->product_id);
        $uniqueId = $product->id . '-' . ($request->cake_size ?? '') . '-' . ($request->cake_base ?? '');

        Cart::session(session()->getId())->add([
            'id' => $uniqueId,
            'name' => $product->name,
            'price' => $product->sale_price ?? $product->price,
            'quantity' => $request->get('quantity', 1),
            'attributes' => [
                'product_id' => $product->id,
                'image' => $product->primaryImage?->image_path,
                'slug' => $product->slug,
                'cake_size' => $request->cake_size,
                'cake_base' => $request->cake_base,
            ],
        ]);

        return response()->json([
            'message' => 'Them vao gio hang thanh cong!',
            'count' => Cart::session(session()->getId())->getContent()->sum('quantity'),
        ]);
    }

    public function update(Request $request)
    {
        Cart::session(session()->getId())->update($request->row_id, [
            'quantity' => ['relative' => false, 'value' => $request->quantity],
        ]);
        return $this->index();
    }

    public function remove($rowId)
    {
        Cart::session(session()->getId())->remove($rowId);
        return $this->index();
    }

    public function count()
    {
        return response()->json([
            'count' => Cart::session(session()->getId())->getContent()->sum('quantity'),
        ]);
    }
}
```

### 7.3 Frontend Cart Integration

Cap nhat `script.js` them cac ham AJAX:
- `addToCart(productId, size, base)` -- POST den `/gio-hang/them`
- `updateCartQuantity(rowId, qty)` -- PATCH den `/gio-hang/cap-nhat`
- `removeFromCart(rowId)` -- DELETE den `/gio-hang/xoa/{rowId}`
- `loadCart()` -- GET den `/gio-hang` va render trong cart drawer
- Cap nhat `.cart-badge` count sau moi thao tac

Cart drawer (`<x-cart-drawer />`) render sidebar, duoc cap nhat qua JavaScript AJAX.

---

## 8. Quan ly Don hang

### 8.1 Luong don hang

1. Khach hang dien form thanh toan va gui
2. Don hang tao voi status `pending`
3. Admin thay don moi trong Filament dashboard
4. Admin cap nhat trang thai: `pending` -> `confirmed` -> `processing` -> `shipping` -> `delivered` -> `completed`
5. Admin co the huy bat cu luc nao voi ly do

### 8.2 Dinh dang ma don

Tu dong tao trong `Order::booted()`: `THC-YYYYMMDD-NNNN` (vd: `THC-20260326-0001`)

### 8.3 CheckoutRequest Validation

```php
class CheckoutRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|regex:/^0[0-9]{9,10}$/',
            'customer_email' => 'nullable|email',
            'delivery_datetime' => 'required|date|after:now',
            'note' => 'nullable|string|max:1000',
            'is_gift' => 'boolean',
            'recipient_name' => 'required_if:is_gift,true|nullable|string|max:255',
            'recipient_phone' => 'required_if:is_gift,true|nullable|string',
            'delivery_method' => 'required|in:ship,pickup',
            'city' => 'required_if:delivery_method,ship',
            'district' => 'required_if:delivery_method,ship',
            'ward' => 'nullable|string',
            'address' => 'required_if:delivery_method,ship',
            'pickup_store_id' => 'required_if:delivery_method,pickup|nullable|exists:store_locations,id',
            'payment_method' => 'required|in:bank_transfer,cod',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Vui long nhap ho va ten.',
            'customer_phone.required' => 'Vui long nhap so dien thoai.',
            'customer_phone.regex' => 'So dien thoai khong hop le.',
            'delivery_datetime.required' => 'Vui long chon thoi gian nhan banh.',
            'delivery_datetime.after' => 'Thoi gian nhan banh phai sau thoi diem hien tai.',
        ];
    }
}
```

---

## 9. Quan ly Anh

### 9.1 Cau hinh Storage

Dung `public` disk trong `config/filesystems.php`. Chay `php artisan storage:link` de tao symlink.

### 9.2 Cau truc thu muc trong `storage/app/public/`

```
storage/app/public/
├── products/          (anh san pham tu Filament upload)
├── products/content/  (anh trong mo ta san pham qua RichEditor)
├── blog/              (anh dai dien blog)
├── blog/content/      (anh trong noi dung blog)
├── heroes/            (anh hero slide)
├── banners/           (anh banner)
├── categories/        (anh danh muc)
└── settings/          (logo, v.v.)
```

### 9.3 Di chuyen anh hien co

Khi setup ban dau:
- `image_san_pham/*` -> `storage/app/public/products/`
- `images/logo.png` -> `storage/app/public/settings/logo.png`
- `images/web2-01.webp`, `web2-02.webp`, `Anh-co-so-thu-huong-cake.webp` -> `storage/app/public/banners/`

Seeder se tham chieu cac duong dan nay.

---

## 10. Authentication

### 10.1 Xac thuc Khach hang

Dung Laravel Breeze hoac tu code:

**Truong dang ky:**
- `name` (Ho va ten)
- `phone` (So dien thoai) -- unique, dinh danh chinh
- `email` (nullable)
- `password`

**Them cot `phone` vao bang `users`:**

```php
Schema::table('users', function (Blueprint $table) {
    $table->string('phone')->nullable()->unique()->after('email');
    $table->string('address')->nullable()->after('phone');
    $table->string('city')->nullable();
    $table->string('district')->nullable();
    $table->boolean('is_admin')->default(false);
});
```

### 10.2 Xac thuc Admin

Filament dung auth guard rieng. Tao admin user qua:

```bash
php artisan make:filament-user
```

Trong User model:

```php
public function canAccessPanel(Panel $panel): bool
{
    return $this->is_admin;
}
```

### 10.3 Tich hop Login Modal

Login modal hien co trong HTML tinh van giu nguyen. Khi submit form, POST den `/dang-nhap` qua AJAX. Thanh cong -> reload trang. That bai -> hien loi trong modal.

---

## 11. Database Seeding

### 11.1 SettingsSeeder

```php
$settings = [
    ['key' => 'site_name', 'value' => 'Thu Huong Cake', 'group' => 'general'],
    ['key' => 'hotline', 'value' => '0962.849.989', 'group' => 'contact'],
    ['key' => 'email', 'value' => 'donhang@thuhuongcake.vn', 'group' => 'contact'],
    ['key' => 'opening_hours', 'value' => '07:00 - 23:00', 'group' => 'general'],
    ['key' => 'shipping_fee_default', 'value' => '30000', 'group' => 'shipping'],
    ['key' => 'free_shipping_min_order', 'value' => '300000', 'group' => 'shipping'],
    ['key' => 'free_shipping_distance_km', 'value' => '3', 'group' => 'shipping'],
    ['key' => 'address_hanoi', 'value' => 'So 72 Ngo 235 Pho Yen Hoa, P. Yen Hoa, Q. Cau Giay, Ha Noi.', 'group' => 'contact'],
    ['key' => 'address_hcm', 'value' => '801 Duong Hau Giang, Phuong 11, Quan 6, TP Ho Chi Minh', 'group' => 'contact'],
    ['key' => 'business_license', 'value' => '0111010237', 'group' => 'general'],
];
```

### 11.2 CategorySeeder

```php
$categories = [
    ['name' => 'Banh Sinh Nhat Mini', 'slug' => 'banh-sinh-nhat-mini', 'sort_order' => 1],
    ['name' => 'Banh Sinh Nhat Hoa Qua', 'slug' => 'banh-sinh-nhat-hoa-qua', 'sort_order' => 2],
    ['name' => 'Banh Bong Lan Trung Muoi', 'slug' => 'banh-bong-lan-trung-muoi', 'sort_order' => 3],
    ['name' => 'Set Banh Lam Qua', 'slug' => 'set-banh-lam-qua', 'sort_order' => 4],
    ['name' => 'Banh Dac Biet (Signature Cakes)', 'slug' => 'banh-dac-biet', 'sort_order' => 5],
    ['name' => 'Banh Sinh Nhat Cho Be', 'slug' => 'banh-sinh-nhat-cho-be', 'sort_order' => 6],
    ['name' => 'Banh Kem Su Kien', 'slug' => 'banh-kem-su-kien', 'sort_order' => 7],
    ['name' => 'Banh Sinh Nhat Tang', 'slug' => 'banh-sinh-nhat-tang', 'sort_order' => 8],
    ['name' => 'Banh Sinh Nhat Hinh Trai Tim', 'slug' => 'banh-sinh-nhat-hinh-trai-tim', 'sort_order' => 9],
    ['name' => 'Banh Sinh Nhat Hoa Kem', 'slug' => 'banh-sinh-nhat-hoa-kem', 'sort_order' => 10],
    ['name' => 'Banh Kem Ve Hinh', 'slug' => 'banh-kem-ve-hinh', 'sort_order' => 11],
    ['name' => 'Banh Kem Tao Hinh', 'slug' => 'banh-kem-tao-hinh', 'sort_order' => 12],
    ['name' => 'Banh An Nhanh', 'slug' => 'banh-an-nhanh', 'sort_order' => 13],
    ['name' => 'Banh Sinh Nhat', 'slug' => 'banh-sinh-nhat', 'sort_order' => 14],
    ['name' => 'Banh Kem Ngay Le', 'slug' => 'banh-kem-ngay-le', 'sort_order' => 15],
];
```

### 11.3 CakeSizeSeeder

```php
$sizes = [
    ['name' => '16cm', 'sort_order' => 1],
    ['name' => '18cm', 'sort_order' => 2],
    ['name' => '20cm', 'sort_order' => 3],
    ['name' => '22cm', 'sort_order' => 4],
    ['name' => '25cm', 'sort_order' => 5],
];
```

### 11.4 CakeBaseSeeder

```php
$bases = [
    ['name' => 'Gato Vani Nhan Viet Quat', 'sort_order' => 1],
    ['name' => 'Gato Red Velvet', 'sort_order' => 2],
    ['name' => 'Gato Socola', 'sort_order' => 3],
    ['name' => 'Gato Tra Xanh', 'sort_order' => 4],
];
```

### 11.5 StoreLocationSeeder

```php
$stores = [
    ['name' => 'CS1: 11A Pho Dich Vong', 'short_name' => 'Co so 1',
     'address' => '11A Dich Vong, Cau Giay, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Cau Giay', 'phone' => '0982.811.096', 'sort_order' => 1],
    ['name' => 'CS2: 22 Dich Vong', 'short_name' => 'Co so 2',
     'address' => '22 Dich Vong, Cau Giay, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Cau Giay', 'phone' => '0982.811.096', 'sort_order' => 2],
    ['name' => 'CS3: 22 Quan Nhan', 'short_name' => 'Co so 3',
     'address' => '22 Quan Nhan, Trung Hoa, Cau Giay, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Cau Giay', 'phone' => '0984.438.898', 'sort_order' => 3],
    ['name' => 'CS4: 72 Chinh Kinh', 'short_name' => 'Co so 4',
     'address' => '72 Chinh Kinh, Thanh Xuan, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Thanh Xuan', 'phone' => '0988.064.164', 'sort_order' => 4],
    ['name' => 'CS5: 74 Ton That Tung', 'short_name' => 'Co so 5',
     'address' => '74 Ton That Tung, Khuong Thuong, Dong Da, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Dong Da', 'phone' => '0962.711.371', 'sort_order' => 5],
    ['name' => 'CS6: 898 Thuy Khue', 'short_name' => 'Co so 6',
     'address' => '898 Thuy Khue, Tay Ho, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Tay Ho', 'phone' => '0988.504.514', 'sort_order' => 6],
    ['name' => 'CS7: 67 Truong Dinh', 'short_name' => 'Co so 7',
     'address' => '67 Truong Dinh, Hai Ba Trung, Ha Noi', 'city' => 'Ha Noi',
     'district' => 'Hai Ba Trung', 'phone' => '0963.910.920', 'sort_order' => 7],
    ['name' => 'CS8: 801 Hau Giang', 'short_name' => 'Co so 8',
     'address' => '801 Duong Hau Giang, Phuong 11, Quan 6, TP.HCM', 'city' => 'TP Ho Chi Minh',
     'district' => 'Quan 6', 'phone' => '0862.089.099', 'sort_order' => 8],
];
```

### 11.6 ProductSeeder

```php
$products = [
    // Set Banh Lam Qua
    ['name' => 'Set qua tang banh mix vi', 'category' => 'set-banh-lam-qua',
     'price' => 90000, 'image' => 'products/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg'],
    ['name' => 'Set banh mix vi trai tim', 'category' => 'set-banh-lam-qua',
     'price' => 135000, 'image' => 'products/Banh-bong-lan-pho-mai-cah-bong.jpg'],
    ['name' => 'Set banh mini mix vi', 'category' => 'set-banh-lam-qua',
     'price' => 300000, 'image' => 'products/Banh-bong-lan-kem-trung.jpg'],
    ['name' => 'Sweet box mix vi trai tim', 'category' => 'set-banh-lam-qua',
     'price' => 135000, 'image' => 'products/download.jpg'],
    ['name' => 'Sweet box mix vi trai cay', 'category' => 'set-banh-lam-qua',
     'price' => 180000, 'image' => 'products/download.webp'],

    // Banh Sinh Nhat Mini
    ['name' => 'Banh kem viet quat tuoi mat', 'category' => 'banh-sinh-nhat-mini',
     'price' => 160000, 'is_hot' => true, 'image' => 'products/Banh-kem-viet-quat-tuoi-mat-7.webp'],
    ['name' => 'Banh kem mini mau hong dep', 'category' => 'banh-sinh-nhat-mini',
     'price' => 120000, 'image' => 'products/Banh-kem-mini-mau-hong-dep-nhat-5.jpg'],
    ['name' => 'Banh sinh nhat kem chay tone hong', 'category' => 'banh-sinh-nhat-mini',
     'price' => 160000, 'image' => 'products/Banh-bong-lan-kem-trung.jpg'],
    ['name' => 'Banh kem mini dau tay', 'category' => 'banh-sinh-nhat-mini',
     'price' => 120000, 'image' => 'products/download.webp'],
    ['name' => 'Banh sinh nhat size nho xinh xan', 'category' => 'banh-sinh-nhat-mini',
     'price' => 120000, 'image' => 'products/Banh-bong-lan-pho-mai-cah-bong.jpg'],

    // Banh Sinh Nhat
    ['name' => 'Banh sinh nhat cho tiec lien hoan', 'category' => 'banh-sinh-nhat',
     'price' => 500000, 'image' => 'products/download.jpg'],
    ['name' => 'Banh kem van phong', 'category' => 'banh-sinh-nhat',
     'price' => 500000, 'image' => 'products/Banh-kem-viet-quat-tuoi-mat-7.webp'],
    ['name' => 'Banh sinh nhat hinh chu nhat hoa qua', 'category' => 'banh-sinh-nhat',
     'price' => 500000, 'image' => 'products/Banh-bong-lan-trung-muoi-truyen-thong-5.jpg'],
    ['name' => 'Banh sinh nhat vuong hoa kem dep', 'category' => 'banh-sinh-nhat',
     'price' => 610000, 'image' => 'products/Banh-kem-mini-mau-hong-dep-nhat-5.jpg'],
    ['name' => 'Banh gato hinh vuong trang tri hoa kem', 'category' => 'banh-sinh-nhat',
     'price' => 1000000, 'image' => 'products/Banh-bong-lan-kem-trung.jpg'],

    // San pham trang chi tiet
    ['name' => 'Banh kem qua bi ngo', 'category' => 'banh-sinh-nhat',
     'price' => 220000, 'image' => 'products/Banh-kem-viet-quat-tuoi-mat-7.webp'],
];
```

### 11.7 HeroSlideSeeder

```php
$slides = [
    [
        'badge_text' => 'Thu Huong Cake',
        'title_line1' => 'Banh Sinh Nhat',
        'title_line2' => 'Tuoi Ngon Moi Ngay',
        'description' => 'Mang den nhung chiec banh tuoi ngon, dep mat...',
        'button1_text' => 'Dat Banh Ngay',
        'button1_url' => '/san-pham',
        'button2_text' => 'Xem Menu',
        'button2_url' => '/san-pham',
        'image' => 'heroes/Banh-kem-viet-quat-tuoi-mat-7.webp',
        'sort_order' => 1,
    ],
    [
        'badge_text' => 'Dac Biet',
        'title_line1' => 'Set Banh Lam Qua',
        'title_line2' => 'Ngot Ngao Yeu Thuong',
        'description' => 'Nhung set banh xinh xan, dong hop tinh te...',
        'button1_text' => 'Xem Ngay',
        'button1_url' => '/san-pham',
        'button2_text' => 'Huong Dan Dat',
        'button2_url' => '/huong-dan-dat-banh',
        'image' => 'heroes/Banh-kem-mini-mau-hong-dep-nhat-5.jpg',
        'sort_order' => 2,
    ],
    [
        'badge_text' => 'Freeship 3km',
        'title_line1' => 'Giao Hang',
        'title_line2' => 'Nhanh Trong 1 Gio',
        'description' => 'Ship hoa toc trong vong 1 gio, freeship 3km...',
        'button1_text' => 'Dat Banh Ngay',
        'button1_url' => '/san-pham',
        'button2_text' => 'Tim Cua Hang',
        'button2_url' => '/cua-hang',
        'image' => 'heroes/Banh-bong-lan-kem-trung.jpg',
        'sort_order' => 3,
    ],
];
```

### 11.8 BlogSeeder

Seed 3 blog categories ("Cam nang lam banh", "Mau banh kem", "Tin tuc") va khoang 10 bai viet trich tu noi dung blog tinh.

### 11.9 PageSeeder

Seed trang "Gioi thieu" tu `about.html` va "Huong dan" tu `guide.html`.

### 11.10 AdminUserSeeder

```php
User::create([
    'name' => 'Admin Thu Huong',
    'email' => 'admin@thuhuongcake.vn',
    'phone' => '0962849989',
    'password' => Hash::make('thuhuong2024'),
    'is_admin' => true,
]);
```

---

## 12. Deployment

### 12.1 Yeu cau Server

- PHP 8.2+
- MySQL 8.0+ hoac MariaDB 10.6+
- Composer 2.x
- Node.js 18+ (cho Vite)
- Nginx hoac Apache

### 12.2 Cau hinh `.env`

```env
APP_NAME="Thu Huong Cake"
APP_URL=https://thuhuongcake.vn
APP_LOCALE=vi
APP_TIMEZONE=Asia/Ho_Chi_Minh

DB_DATABASE=thu_huong_cake
DB_USERNAME=...
DB_PASSWORD=...

SESSION_DRIVER=database
CACHE_DRIVER=file
QUEUE_CONNECTION=database

FILESYSTEM_DISK=public
```

### 12.3 Cac buoc Deploy

```bash
# 1. Cai dat dependencies
composer install --optimize-autoloader --no-dev

# 2. Tao key
php artisan key:generate

# 3. Chay migration va seeder
php artisan migrate --seed

# 4. Tao symlink storage
php artisan storage:link

# 5. Copy anh tu frontend cu vao storage/app/public/

# 6. Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# 7. Cai dat SSL (Let's Encrypt)
```

### 12.4 Nginx Configuration

```nginx
server {
    listen 443 ssl http2;
    server_name thuhuongcake.vn www.thuhuongcake.vn;
    root /var/www/thu-huong-cake/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 12.5 Helper Function cho Settings

Tao `app/Helpers/helpers.php`:

```php
function setting(string $key, $default = null): ?string
{
    return cache()->rememberForever("setting.{$key}", function () use ($key, $default) {
        $setting = \App\Models\Setting::where('key', $key)->first();
        return $setting?->value ?? $default;
    });
}
```

Dang ky trong `composer.json`:

```json
"autoload": {
    "files": ["app/Helpers/helpers.php"]
}
```

---

## Thu tu trien khai de xuat

| Phase | Noi dung | Thoi gian |
|-------|----------|-----------|
| **Phase 1** | Laravel setup, migrations, models, seeders | 2 ngay |
| **Phase 2** | Filament Admin Panel (tat ca resources + widgets) | 3 ngay |
| **Phase 3** | Chuyen HTML -> Blade (layout, components, pages) | 4 ngay |
| **Phase 4** | Gio hang + Checkout + Dat hang | 3 ngay |
| **Phase 5** | Auth, Search, SEO, Test, Bug fix | 2 ngay |

**Tong: ~14 ngay lam viec**

---

## File tham chieu chinh tu frontend hien tai

- `index.html` -- Tham chieu cho master layout, tat ca shared components, hero slider, banners, product grid, blog section
- `product-detail.html` -- Tham chieu cho trang chi tiet san pham (gallery, size/base options, order button, related products)
- `checkout.html` -- Tham chieu cho trang thanh toan (form khach hang, gift toggle, delivery tabs, payment)
- `products.html` -- Tham chieu cho trang danh sach san pham (sidebar, sort, grid, pagination)
- `script.js` -- JavaScript hien co can giu lai va mo rong them AJAX cart functions
