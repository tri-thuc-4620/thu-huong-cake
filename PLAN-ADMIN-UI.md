# PLAN: Giao dien Quan ly (Admin UI)

> Chi tap trung vao giao dien, chua lam logic xu ly

---

## Buoc 1: Khoi tao Project Laravel + Filament

```bash
composer create-project laravel/laravel thu-huong-cake
cd thu-huong-cake
composer require filament/filament:"^3.0"
php artisan filament:install --panels
```

- Cau hinh .env ket noi database `thu_huong_cake`
- Tao admin user: `php artisan make:filament-user`
- Truy cap admin tai: `http://localhost/admin`

---

## Buoc 2: Tao Migrations (cau truc bang)

Tao 18 bang theo thu tu:

| # | Bang | Mo ta |
|---|------|-------|
| 1 | categories | Danh muc banh |
| 2 | cake_sizes | Kich thuoc (16cm, 18cm...) |
| 3 | cake_bases | Cot banh (Gato Vani, Red Velvet...) |
| 4 | products | San pham |
| 5 | product_images | Anh san pham |
| 6 | product_cake_size | Pivot: san pham - kich thuoc (co phu phi) |
| 7 | product_cake_base | Pivot: san pham - cot banh (co phu phi) |
| 8 | orders | Don hang |
| 9 | order_items | Chi tiet don hang |
| 10 | blog_categories | Danh muc blog |
| 11 | blog_posts | Bai viet |
| 12 | store_locations | Cua hang |
| 13 | hero_slides | Slider trang chu |
| 14 | banners | Banner quang cao |
| 15 | contact_messages | Tin nhan lien he |
| 16 | callback_requests | Yeu cau goi lai |
| 17 | pages | Trang tinh |
| 18 | settings | Cai dat chung |

---

## Buoc 3: Tao Models (co ban)

Tao 16 model voi `$fillable` va `$casts`, chua can logic phuc tap:

- Category, Product, ProductImage
- CakeSize, CakeBase
- Order, OrderItem
- BlogCategory, BlogPost
- StoreLocation, HeroSlide, Banner
- ContactMessage, CallbackRequest
- Page, Setting

---

## Buoc 4: Giao dien Admin - 9 trang quan ly

### 4.1 Dashboard (`/admin`)

3 widgets:
- **Thong ke nhanh**: Tong san pham | Tong don hang | Don cho xu ly | Doanh thu hom nay
- **Don hang moi nhat**: Bang 10 dong (ma don, khach hang, tong tien, trang thai)
- **Bieu do doanh thu**: Line chart 30 ngay (de trong, chua can data that)

---

### 4.2 Quan ly San pham (`/admin/products`)

**Trang danh sach:**

| Cot | Kieu |
|-----|------|
| Anh | ImageColumn (anh chinh) |
| Ten san pham | Text, searchable |
| Danh muc | Text (tu category) |
| Gia | Text, format VND |
| Gia KM | Text, format VND |
| Hien thi | Icon true/false |
| Hot | Icon true/false |
| Tinh trang kho | Badge mau (xanh/do/vang) |
| Luot xem | Text |
| Ngay tao | Date |

**Bo loc:** Danh muc | Trang thai | Hot | Tinh trang kho

**Form them/sua - 6 sections:**

1. **Thong tin co ban**
   - Ten san pham (TextInput, required) -> auto tao slug
   - Slug (TextInput, unique)
   - Danh muc (Select, searchable)
   - Ma san pham / SKU (TextInput)

2. **Gia & Kho hang**
   - Gia goc (TextInput, numeric, suffix "d")
   - Gia khuyen mai (TextInput, numeric, suffix "d")
   - So luong ton kho (TextInput, numeric)
   - Tinh trang (Select: Con banh / Het banh / Dat truoc)

3. **Tuy chon banh & Gia theo tuy chon**
   - Repeater "Kich thuoc & Gia":
     - Kich thuoc (Select tu cake_sizes)
     - Gia rieng cho size nay (TextInput, numeric) -- de trong = lay gia goc
   - Repeater "Cot banh & Phu phi":
     - Cot banh (Select tu cake_bases)
     - Phu phi (TextInput, numeric, default 0)

4. **Hinh anh san pham**
   - Repeater upload nhieu anh:
     - File upload (image, directory: products)
     - Mo ta anh (TextInput)
     - Anh chinh? (Toggle)
     - Thu tu (TextInput, numeric)

5. **Mo ta**
   - Mo ta ngan (Textarea, 3 dong)
   - Mo ta chi tiet (RichEditor, ho tro upload anh)

6. **Hien thi & SEO**
   - Toggle: Hien thi | Noi bat | Hot | Moi
   - Thu tu sap xep (TextInput, numeric)
   - Meta Title (TextInput)
   - Meta Description (Textarea)

---

### 4.3 Quan ly Danh muc (`/admin/categories`)

**Danh sach:** Ten | Slug | Danh muc cha | So san pham | Hien thi | Hien menu | Thu tu

**Form:**
- Ten (TextInput) -> auto slug
- Danh muc cha (Select, tu tham chieu)
- Mo ta (Textarea)
- Anh dai dien (FileUpload)
- Thu tu (TextInput)
- Toggle: Hien thi | Hien thi tren menu
- Meta Title, Meta Description

---

### 4.4 Quan ly Don hang (`/admin/orders`)

**Danh sach:**

| Cot | Kieu |
|-----|------|
| Ma don | Text (THC-20260326-0001) |
| Khach hang | Text, searchable |
| SDT | Text, searchable |
| Tong tien | Text, format VND |
| Trang thai | Badge mau (7 trang thai) |
| Hinh thuc | Text (Giao tan noi / Nhan tai CH) |
| Thanh toan | Text (Chuyen khoan / COD) |
| Thoi gian nhan | DateTime |
| Ngay dat | DateTime |

**Bo loc:** Trang thai | Hinh thuc giao | Phuong thuc thanh toan | Khoang ngay

**Trang xem chi tiet don hang (ViewPage):**

- Section "Thong tin khach hang": Ten, SDT, Email
- Section "Thong tin giao hang": Hinh thuc, Dia chi / Cua hang nhan
- Section "Thoi gian nhan": Ngay gio
- Section "Ghi chu": Loi nhan cua khach
- Section "Qua tang": Nguoi nhan, SDT nguoi nhan (neu la qua)
- Section "San pham da dat": Bang (Ten SP, Size, Cot banh, SL, Don gia, Thanh tien)
- Section "Thanh toan": Tam tinh, Phi ship, Giam gia, Tong cong
- Section "Trang thai": Status hien tai + dropdown doi status
- Section "Ghi chu admin": Textarea

**Nut hanh dong nhanh (tren bang danh sach):**
- Xac nhan don (khi status = pending)
- Bat dau lam banh (khi status = confirmed)
- Giao hang (khi status = processing)
- Hoan thanh (khi status = shipping/delivered)
- Huy don (bat ky luc nao, yeu cau nhap ly do)

---

### 4.5 Quan ly Blog (`/admin/blog-posts`)

**Danh sach:** Anh | Tieu de | Danh muc | Tac gia | Da dang? | Luot xem | Ngay dang

**Form:**
- Tieu de (TextInput) -> auto slug
- Danh muc blog (Select)
- Tac gia (Select)
- Anh dai dien (FileUpload)
- Tom tat (Textarea)
- Noi dung (RichEditor, ho tro upload anh)
- Toggle: Da xuat ban
- Ngay xuat ban (DateTimePicker)
- Meta Title, Meta Description

---

### 4.6 Quan ly Cua hang (`/admin/store-locations`)

**Danh sach:** Ten | Dia chi | Thanh pho | SDT | Hoat dong | Thu tu

**Form:**
- Ten cua hang (TextInput)
- Ten ngan (TextInput)
- Dia chi (TextInput)
- Thanh pho (Select: Ha Noi / TP HCM)
- Quan/Huyen (TextInput)
- SDT (TextInput)
- Kinh do, Vi do (TextInput, nullable)
- Link Google Maps (TextInput)
- Toggle: Hoat dong
- Thu tu (TextInput)

---

### 4.7 Quan ly Slider trang chu (`/admin/hero-slides`)

**Danh sach:** Anh | Badge | Tieu de | Hoat dong | Thu tu

**Form:**
- Badge text (TextInput) -- "Thu Huong Cake", "Dac Biet"
- Dong 1 tieu de (TextInput) -- "Banh Sinh Nhat"
- Dong 2 tieu de (TextInput) -- "Tuoi Ngon Moi Ngay"
- Mo ta (Textarea)
- Nut 1: Text + URL
- Nut 2: Text + URL (nullable)
- Anh slider (FileUpload)
- Toggle: Hoat dong
- Thu tu (TextInput)

---

### 4.8 Quan ly Banner (`/admin/banners`)

**Danh sach:** Anh | Tieu de | Vi tri | Hoat dong | Thu tu

**Form:**
- Tieu de (TextInput)
- Anh (FileUpload)
- URL lien ket (TextInput)
- Vi tri (Select: Trang chu / Sidebar / Popup)
- Toggle: Hoat dong
- Thu tu (TextInput)

---

### 4.9 Xem Tin nhan lien he (`/admin/contact-messages`)

**Danh sach:** Ten | SDT | Email | Noi dung (cat ngan) | Da doc? | Ngay gui

**Trang xem (chi doc, khong co form tao moi):**
- Thong tin nguoi gui
- Noi dung tin nhan
- Nut "Danh dau da doc"
- Textarea "Tra loi cua admin"

---

### 4.10 Quan ly Trang tinh (`/admin/pages`)

**Danh sach:** Tieu de | Slug | Layout | Da dang | Ngay cap nhat

**Form:**
- Tieu de (TextInput) -> auto slug
- Noi dung (RichEditor)
- Layout (Select: Mac dinh / Co sidebar / Toan trang)
- Toggle: Xuat ban
- Meta Title, Meta Description

---

### 4.11 Cai dat chung (`/admin/settings`)

Khong phai Resource ma la **custom Filament Page** voi 4 tab:

**Tab 1 - Chung:**
- Ten website (TextInput)
- Logo (FileUpload)
- Hotline (TextInput)
- Email (TextInput)
- Gio mo cua (TextInput)

**Tab 2 - Van chuyen:**
- Phi ship mac dinh (TextInput, VND)
- Khoang cach freeship (TextInput, km)
- Don toi thieu de freeship (TextInput, VND)

**Tab 3 - Mang xa hoi:**
- Facebook URL
- Zalo URL
- TikTok URL
- Instagram URL
- YouTube URL

**Tab 4 - Doanh nghiep:**
- Dia chi Ha Noi (TextInput)
- Dia chi TP HCM (TextInput)
- Ma so DKKD (TextInput)

---

## Buoc 5: Tuy chinh giao dien Admin

- **Brand**: Ten "Thu Huong Cake Admin", logo cua hang
- **Mau sac**: Primary color `#e84393` (hong)
- **Sidebar menu** sap xep theo nhom:
  - **Quan ly ban hang**: San pham, Danh muc, Kich thuoc, Cot banh
  - **Don hang**: Don hang
  - **Noi dung**: Blog, Trang tinh, Slider, Banner
  - **Cua hang**: Dia diem cua hang
  - **Lien he**: Tin nhan, Yeu cau goi lai
  - **Cai dat**: Cai dat chung

---

## Tong ket

| Hang muc | So luong |
|----------|---------|
| Filament Resources | 11 |
| Custom Pages | 2 (Dashboard, Settings) |
| Dashboard Widgets | 3 |
| Form sections | ~40 |
| Table columns | ~60 |
| Table filters | ~15 |
| Action buttons | 5 (tren Order) |

**Thu tu lam:**
1. Tao project Laravel + Filament + .env ket noi DB
2. Tao tat ca migrations -> `php artisan migrate`
3. Tao tat ca models (chi fillable + casts + relationships)
4. Tao Filament resources theo thu tu:
   - CakeSize, CakeBase (don gian nhat)
   - Category
   - Product (phuc tap nhat)
   - Order
   - BlogCategory, BlogPost
   - StoreLocation
   - HeroSlide, Banner
   - ContactMessage
   - Page
5. Tao Settings page
6. Tao Dashboard widgets
7. Tuy chinh brand, mau sac, sidebar menu
8. Tao seeders de co data mau xem thu
