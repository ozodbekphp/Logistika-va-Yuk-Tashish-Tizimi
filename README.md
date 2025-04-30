# Logistika-va-Yuk-Tashish-Tizimi
Laravel api

Api Url

// Foydalanuvchi
POST /api/register - Yangi foydalanuvchi ro‘yxatdan o‘tkazish
POST /api/login - Kirish
GET /api/profile - Foydalanuvchi ma’lumotlarini olish
PUT /api/profile - Profilni yangilash

// Yuklar
POST /api/shipments - Yangi yuk ro‘yxatdan o‘tkazish
GET /api/shipments - Yuklar ro‘yxatini olish (filtr va pagination)
GET /api/shipments/{id} - Muayyan yuk haqida ma’lumot
PUT /api/shipments/{id}/status - Yuk holatini yangilash
DELETE /api/shipments/{id} - Yukni o‘chirish

// Kuryer
GET /api/courier/shipments - Kuryer uchun mavjud yuklar
POST /api/courier/shipments/{id}/accept - Yukni qabul qilish
PUT /api/courier/shipments/{id}/deliver - Yukni yetkazildi deb belgilash

// To‘lov
POST /api/payments - Yetkazib berish uchun to‘lov qilish
GET /api/payments/{id} - To‘lov holatini tekshirish

// Admin
GET /api/admin/shipments - Barcha yuklar ro‘yxati
POST /api/admin/shipments/{id}/assign - Yukni kuryerga tayinlash
GET /api/admin/reports - Statistik hisobotlar