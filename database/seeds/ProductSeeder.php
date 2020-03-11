<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductSizeColor;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("insert into products values (1,'MSPRO0','Giày nike 0',1,0,'default.jpg','san pham',1,'giay-nike-0','2020-02-15 02:40:23','2020-02-15 02:40:23'),(2,'MSPRO1','Giày nike 1',1,0,'default.jpg','san pham',1,'giay-nike-1','2020-02-15 02:40:25','2020-02-15 02:40:25'),(3,'MSPRO2','Giày nike 2',1,0,'default.jpg','san pham',1,'giay-nike-2','2020-02-15 02:40:27','2020-02-15 02:40:27'),(4,'MSPRO3','Giày nike 3',1,0,'default.jpg','san pham',1,'giay-nike-3','2020-02-15 02:40:28','2020-02-15 02:40:28'),(5,'MSPRO4','Giày nike 4',1,0,'default.jpg','san pham',1,'giay-nike-4','2020-02-15 02:40:29','2020-02-15 02:40:29'),(6,'MSPRO5','Giày nike 5',1,0,'default.jpg','san pham',1,'giay-nike-5','2020-02-15 02:40:31','2020-02-15 02:40:31'),(7,'MSPRO6','Giày nike 6',1,0,'default.jpg','san pham',1,'giay-nike-6','2020-02-15 02:40:33','2020-02-15 02:40:33'),(8,'MSPRO7','Giày nike 7',1,0,'default.jpg','san pham',1,'giay-nike-7','2020-02-15 02:40:35','2020-02-15 02:40:35'),(9,'MSPRO8','Giày nike 8',1,0,'default.jpg','san pham',1,'giay-nike-8','2020-02-15 02:40:36','2020-02-15 02:40:36'),(10,'MSPRO9','Giày nike 9',1,0,'default.jpg','san pham',1,'giay-nike-9','2020-02-15 02:40:38','2020-02-15 02:40:38'),(11,'MSPRO10','Giày nike 10',1,0,'default.jpg','san pham',1,'giay-nike-10','2020-02-15 02:40:40','2020-02-15 02:40:40'),(12,'MSPRO11','Giày nike 11',1,0,'default.jpg','san pham',1,'giay-nike-11','2020-02-15 02:40:41','2020-02-15 02:40:41'),(13,'MSPRO12','Giày nike 12',1,0,'default.jpg','san pham',1,'giay-nike-12','2020-02-15 02:40:43','2020-02-15 02:40:43'),(14,'MSPRO13','Giày nike 13',1,0,'default.jpg','san pham',1,'giay-nike-13','2020-02-15 02:40:44','2020-02-15 02:40:44'),(15,'MSPRO14','Giày nike 14',1,0,'default.jpg','san pham',1,'giay-nike-14','2020-02-15 02:40:46','2020-02-15 02:40:46'),(16,'MSPRO15','Giày nike 15',1,0,'default.jpg','san pham',1,'giay-nike-15','2020-02-15 02:40:48','2020-02-15 02:40:48'),(17,'MSPRO16','Giày nike 16',1,0,'default.jpg','san pham',1,'giay-nike-16','2020-02-15 02:40:49','2020-02-15 02:40:49'),(18,'MSPRO17','Giày nike 17',1,0,'default.jpg','san pham',1,'giay-nike-17','2020-02-15 02:40:51','2020-02-15 02:40:51'),(19,'MSPRO18','Giày nike 18',1,0,'default.jpg','san pham',1,'giay-nike-18','2020-02-15 02:40:52','2020-02-15 02:40:52'),(20,'MSPRO19','Giày nike 19',1,0,'default.jpg','san pham',1,'giay-nike-19','2020-02-15 02:40:54','2020-02-15 02:40:54'),(21,'MSPRO20','Giày nike 20',1,0,'default.jpg','san pham',1,'giay-nike-20','2020-02-15 02:40:56','2020-02-15 02:40:56'),(22,'MSPRO21','Giày nike 21',1,0,'default.jpg','san pham',1,'giay-nike-21','2020-02-15 02:40:57','2020-02-15 02:40:57'),(23,'MSPRO22','Giày nike 22',1,0,'default.jpg','san pham',1,'giay-nike-22','2020-02-15 02:40:59','2020-02-15 02:40:59'),(24,'MSPRO23','Giày nike 23',1,0,'default.jpg','san pham',1,'giay-nike-23','2020-02-15 02:41:00','2020-02-15 02:41:00'),(25,'MSPRO24','Giày nike 24',1,0,'default.jpg','san pham',1,'giay-nike-24','2020-02-15 02:41:02','2020-02-15 02:41:02'),(26,'MSPRO25','Giày nike 25',1,0,'default.jpg','san pham',1,'giay-nike-25','2020-02-15 02:41:04','2020-02-15 02:41:04'),(27,'MSPRO26','Giày nike 26',1,0,'default.jpg','san pham',1,'giay-nike-26','2020-02-15 02:41:05','2020-02-15 02:41:05'),(28,'MSPRO27','Giày nike 27',1,0,'default.jpg','san pham',1,'giay-nike-27','2020-02-15 02:41:07','2020-02-15 02:41:07'),(29,'MSPRO28','Giày nike 28',1,0,'default.jpg','san pham',1,'giay-nike-28','2020-02-15 02:41:08','2020-02-15 02:41:08'),(30,'MSPRO29','Giày nike 29',1,0,'default.jpg','san pham',1,'giay-nike-29','2020-02-15 02:41:10','2020-02-15 02:41:10'),(31,'MSPRO30','Giày nike êm đẹp chạy bộ',1,0,'1582443860.PNG','<p>san pham</p>',1,'giay-nike-em-dep-chay-bo','2020-02-15 02:41:11','2020-02-23 07:44:20'),(32,'MSPRO31','Giày lười đẹp',1,0,'1582443836.PNG','<p>san pham</p>',1,'giay-luoi-dep','2020-02-15 02:41:12','2020-02-23 07:43:56'),(33,'MSPRO32','Giày nike chạy bộ đen',1,0,'1582443815.PNG','<p>san pham</p>',1,'giay-nike-chay-bo-den','2020-02-15 02:41:14','2020-02-23 07:43:35'),(34,'MSPRO33','Giày nike air cổ thấp',1,0,'1582443786.PNG','<p>san pham</p>',1,'giay-nike-air-co-thap','2020-02-15 02:41:16','2020-02-23 07:43:06'),(35,'MSPRO34','Giày nike chạy bộ',1,0,'1582443760.PNG','<p>san pham</p>',1,'giay-nike-chay-bo','2020-02-15 02:41:18','2020-02-23 07:42:40'),(36,'MSPRO35','Giày Profile đen',1,0,'1582443729.jpg','<p>san pham</p>',1,'giay-profile-den','2020-02-15 02:41:19','2020-02-23 07:42:09'),(37,'MSPRO36','Giày profile xám đẹp',1,0,'1582443707.jpg','<p>san pham</p>',1,'giay-profile-xam-dep','2020-02-15 02:41:21','2020-02-23 07:41:47'),(38,'MSPRO37','Giày addias đẹp',1,0,'1582443663.jpg','<p>san pham</p>',1,'giay-addias-dep','2020-02-15 02:41:23','2020-02-23 07:41:03'),(39,'MSPRO38','Giày puma trắng',1,0,'1582443632.jpg','<p>san pham</p>',1,'giay-puma-trang','2020-02-15 02:41:24','2020-02-23 07:40:32'),(40,'MSPRO39','Giày puma da đẹp',1,0,'1582443592.jpg','<p>san pham</p>',1,'giay-puma-da-dep','2020-02-15 02:41:26','2020-02-23 07:39:52'),(41,'MSPRO40','Giày convert cổ thấp',1,0,'1582443520.jpg','<p>san pham</p>',1,'giay-convert-co-thap','2020-02-15 02:41:27','2020-02-23 07:38:40'),(42,'MSPRO41','Giày Convert',1,0,'1582443499.jpg','<p>san pham</p>',1,'giay-convert','2020-02-15 02:41:29','2020-02-23 07:38:19'),(43,'MSPRO42','Giày MC Qeen',1,0,'1582443476.jpg','<p>san pham</p>',1,'giay-mc-qeen','2020-02-15 02:41:30','2020-02-23 07:37:56'),(44,'MSPRO43','Giày nike profile đẹp',1,0,'1582443448.jpg','<p>san pham</p>',1,'giay-nike-profile-dep','2020-02-15 02:41:32','2020-02-23 07:37:28'),(45,'MSPRO44','Giày nike anphalbounce',1,0,'1582443405.PNG','<p>san pham</p>',1,'giay-nike-anphalbounce','2020-02-15 02:41:33','2020-02-23 07:36:45'),(46,'MSPRO45','Giày nike Yz700',1,0,'1582443356.jpg','<p>san pham</p>',1,'giay-nike-yz700','2020-02-15 02:41:35','2020-02-23 07:35:56'),(47,'MSPRO46','Giày nike yz350',1,0,'1582443339.jpg','<p>san pham</p>',1,'giay-nike-yz350','2020-02-15 02:41:37','2020-02-23 07:35:39'),(48,'MSPRO47','Giày nike ari cổ cao',1,0,'1582443290.jpg','<p>san pham</p>',1,'giay-nike-ari-co-cao','2020-02-15 02:41:39','2020-02-23 07:34:50'),(49,'MSPRO48','Giày balenciaga rep 1:1',1,0,'1582443161.jpg','<p>san pham</p>',1,'giay-balenciaga-rep-11','2020-02-15 02:41:40','2020-02-23 07:32:41'),(50,'BLR1','Giày balenciaga Rep +',1,0,'1582006852.','<p>Gi&agrave;y balenciage đẹp m&ecirc; ngừoi</p>',1,'giay-balenciaga-rep','2020-02-15 02:41:41','2020-02-18 06:20:52')");
        for($i=0;$i<1;$i++)
        {


         $product= Product::find($i);

            $product->categories()->attach([1,2]);
            $size=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>30,
            ]);
            $size2=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>31,
            ]);
            $size3=  ProductSize::create([
                'product_id'=>$product->id,
                'price'=>100000+$i,
                'size'=>32,
            ]);

          ProductSizeColor::create(
              [
                  'product_size_id'=>$size->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);
            ProductSizeColor::create(
              [
                  'product_size_id'=>$size->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size2->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size2->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size3->id,
                  'color'=>'Black',
                  'quantity'=>10,
              ]);  ProductSizeColor::create(
              [
                  'product_size_id'=>$size3->id,
                  'color'=>'Red',
                  'quantity'=>10,
              ]
          );

        }
    }
}
