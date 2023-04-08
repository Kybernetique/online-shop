<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        DB::table('products')->insert([
//            ['name' => 'HP OMEN 25L GT12-1053ur', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'HP OMEN 25L GT12', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ASUS ROG Strix G15DK', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Боевая станция Asus G15DK – весомое преимущество в киберспортивных дисциплинах. Разработанный специально для того, чтобы обеспечить максимально плавную игровую картинку, этот компактный компьютер обладает мощной конфигурацией, в которую входит видеокарта NVIDIA GeForce и процессор AMD Ryzen 5.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Lenovo Legion T5 26IOB6', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ПК Lenovo Legion T5 26IOB6 [90RT0044RS] оснащен процессором Intel Core i5-11400F, который подходит не только для офисной работы, но и для безудержного гейминга. Для этого «сердце» устройства дополнено дискретной видеокартой GeForce RTX 3070 и оперативной памятью 16 ГБ. SSD-накопитель рассчитан на хранение до 256 ГБ информации. Это могут быть и полезные владельцу файлы, программы, и видеоигры. Вся эта начинка заключена в среднеразмерный стильный корпус формата Mid-Tower. Также ПК Lenovo Legion T5 26IOB6 [90RT0044RS] дополнен целым набором портов и интерфейсов для подключения монитора и периферии.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ARDOR GAMING RAGE H292', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ПК ARDOR GAMING RAGE H292 представлен в форм-факторе Mid-Tower и имеет классическую черную расцветку корпуса. Высокая производительность делает данную модель подходящей для любого геймера. Процессор Intel Core i5-12400F с 6 ядрами и 12 потоками, с максимальной тактовой частотой до 4.4 ГГц. Охлаждение процессора представлено башенным кулером DEEPCOOL GAMMAXX GT BK. Для быстродействия при работе в многозадачном режиме имеется 32 гигабайта оперативной памяти стандарта DDR4 с частотой 3200 МГц, работающей в двухканальном режиме. Для хранения данных компьютер оснащен SSD M.2 - накопителем c интерфейсом PCIe 3.0 объемом 1 терабайт. Для сочной картинки с большим количеством кадров в секунду установлена видеокарта GIGABYTE GeForce RTX 3070 GAMING OC (LHR)с 8 гигабайтами видеопамяти стандарта GDDR6. Для подключения мониторов предусмотрено четыре видеоразъема: DisplayPort (3 шт.) и HDMI, а для различной периферии и аудиотехники имеются пять портов USB 2.0, пять интерфейсов USB 3.2 Gen1, один USB 3.2 Gen2 Type-C, а также комбинированный аудиоразъем jack 3.5 мм для наушников или микрофона.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'MSI MAG Infinite S3', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Изначально задумывавшийся как геймерская платформа, компьютер MAG Infinite S3 может похвастать уникальным дизайном, в котором красота гармонично сочетается с функциональностью. Персонализируемая полноцветная подсветка оживляет всю систему, а большие воздухозаборники гарантируют эффективную вентиляцию.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Apple MacBook Air', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Ноутбук Apple MacBook Air позволяет с удобством работать благодаря эргономичной тихой клавиатуре с подсветкой и широкой мультисенсорной панели. Акустическая система со стереодинамиками воспроизводит четкий насыщенный звук. Также ноутбук получил веб-камеру, востребованные интерфейсы проводной и беспроводной связи, сканер отпечатка пальцев. Литий-полимерный аккумулятор способен обеспечить около 18 часов автономной работы и поддерживает функцию ускоренной зарядки.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ASUS VivoBook ', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Этот ноутбук создан для тех, кто хочет получить хорошее производительное компьютерное устройство с наиболее востребованным функционалом. Данная модель полностью удовлетворяет данные требования. Надежный накопитель предоставляет вам возможности для долговременного хранения необходимой виртуальной информации. Устройство оборудовано веб-камерой и микрофоном, благодаря которым вы сможете организовывать видеоконференции с партнерами по бизнесу и коллегами по работе.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'iPhone X 64GB', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'iPhone X 256GB', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'HTC One S', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Microsoft Windows 10 Home', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => '1С:Предприятие 8', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Kaspersky Internet Security', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Антивирус Kaspersky Internet Security Multi-Device – лицензионная программа для защиты любого цифрового устройства на основе операционных систем Android, MAC OS X, Windows. Пароли, интернет-платежи и прочие конфиденциальные данные владельца будут в безопасности. Программа рассчитана на 36 мес использования. Она поставляется в коробке. Антивирус Kaspersky Internet Security Multi-Device предназначен для чистой установки. Надежность, высокая степень защиты и простота использования – главные достоинства этой программы.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Dr.Web Mobile Security', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Установите на мобильное устройство комплексное антивирусное решение Dr.Web Mobile Security — это позволит защищаться от всех типов вредоносного ПО, используемого мошенниками для совершения киберпреступлений. В его состав должны входить антивирус, Фильтр звонков и SMS, антивор и URL-фильтр.', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Intel Core i9-12900F OEM', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Intel Core i7-12700K OEM', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'AMD Ryzen 7 7700X BOX', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'AMD Ryzen 5 5600X OEM', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'GIGABYTE GeForce RTX 4090', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ASUS TUF RTX 3060', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'TP-LINK Archer C80', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'TP-Link Archer AX53', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Keenetic Giga', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'ASUS RT-AX55', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Наушники Beats Audio', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Камера GoPro', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Камера Panasonic HC-V770', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Для серьёзной видео съемки нужна серьёзная камера. Panasonic HC-V770 для этих целей лучший выбор!', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Кофемашина DeLonghi', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Холодильник Haier', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Блендер Moulinex', 'category_id' => , 'image' => , 'description' => , 'price' => ]
//            ['name' => 'Мясорубка Bosch', 'category_id' => , 'image' => , 'description' => , 'price' => ]]);
    }
}
