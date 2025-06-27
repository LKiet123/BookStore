<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('books')->insert([
            'title' => 'Dế Mèn Phiêu Lưu Kí',
            'summary' => "Cuộc hành trình của chú dế Mèn từ một sinh vật kiêu ngạo đến người anh hùng hiểu biết, trải qua nhiều thử thách và gặp gỡ với các loài vật khác nhau.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 1,
            'publisher_id' => 1,
            'description' => "Tác phẩm kinh điển này không chỉ là một câu chuyện phiêu lưu hấp dẫn mà còn chứa đựng những bài học sâu sắc về lòng dũng cảm, tình bạn và sự trưởng thành. Với ngôn ngữ gần gũi và hình ảnh sinh động, cuốn sách đã trở thành người bạn đồng hành của nhiều thế hệ thiếu nhi Việt Nam.",
            'price' => 89000,
            'cover_image' => "de-men-phieu-luu-ki.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Tuổi Thơ Dữ Dội',
            'summary' => " Câu chuyện về những thiếu niên tham gia kháng chiến chống Pháp, đặc biệt là nhân vật Mừng, một cậu bé 12 tuổi với lòng yêu nước mãnh liệt",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 2,
            'publisher_id' => 1,
            'description' => "Tác phẩm khắc họa chân thực cuộc sống và tâm hồn của những đứa trẻ trong chiến tranh, thể hiện sự hy sinh, lòng dũng cảm và tình bạn sâu sắc. Cuốn sách là một bản anh hùng ca về tuổi thơ trong thời loạn lạc, khiến người đọc không khỏi xúc động và suy ngẫm",
            'price' => 95000,
            'cover_image' => 'tuoi-tho-du-doi.png',
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Nỗi Buồn Chiến Tranh',
            'summary' => "Ký ức của một người lính Bắc Việt sau chiến tranh, tái hiện những trải nghiệm đau thương và mất mát trong cuộc chiến.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 3,
            'publisher_id' => 2,
            'description' => " Với lối kể chuyện phi tuyến tính và ngôn ngữ giàu cảm xúc, cuốn tiểu thuyết này đưa người đọc vào thế giới nội tâm đầy giằng xé của người lính, phản ánh những hậu quả tâm lý nặng nề của chiến tranh. Đây là một trong những tác phẩm văn học Việt Nam được quốc tế công nhận rộng rãi.",
            'price' => 110000,
            'cover_image' => 'noi-buon-chien-tranh.png',
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Số Đỏ',
            'summary' => "Câu chuyện hài hước về Xuân Tóc Đỏ, một kẻ may mắn bất ngờ trở thành người nổi tiếng trong xã hội thượng lưu Hà Nội thời Pháp thuộc.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 4,
            'publisher_id' => 3,
            'description' => "Tác phẩm là một bức tranh châm biếm sắc sảo về xã hội Việt Nam trong thời kỳ giao thoa văn hóa Đông – Tây, phơi bày sự giả tạo và lố bịch của tầng lớp thượng lưu. Với ngôn ngữ dí dỏm và tình huống trào phúng, cuốn sách mang đến những tiếng cười sâu cay và những suy ngẫm về xã hội.",
            'price' => 90000,
            'cover_image' => 'so-do.png',
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Truyện Kiều',
            'summary' => " Cuộc đời đầy bi kịch của Thúy Kiều, một người con gái tài sắc vẹn toàn, phải hy sinh bản thân để cứu gia đình.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 5,
            'publisher_id' => 3,
            'description' => "Được coi là kiệt tác của văn học Việt Nam, Truyện Kiều không chỉ nổi bật với nghệ thuật thơ ca mà còn phản ánh sâu sắc thân phận con người và những bất công xã hội. Tác phẩm đã trở thành biểu tượng văn hóa, được truyền tụng qua nhiều thế hệ",
            'price' => 85000,
            'cover_image' => "truyen-kieu.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Hiểu Về Trái Tim',
            'summary' => "Cuốn sách hướng dẫn người đọc hiểu và quản lý cảm xúc để sống hạnh phúc và bình an hơn.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 6,
            'publisher_id' => 4,
            'description' => "Với lối viết giản dị và sâu sắc, tác giả chia sẻ những trải nghiệm và bài học về tình yêu, nỗi đau, sự tha thứ và lòng biết ơn. Cuốn sách như một người bạn đồng hành, giúp người đọc khám phá và chữa lành tâm hồn.",
            'price' => 120000,
            'cover_image' => "hieu-ve-trai-tim.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Tôi Thấy Hoa Vàng Trên Cỏ Xanh',
            'summary' => "Câu chuyện về tuổi thơ trong sáng và những kỷ niệm đẹp ở một làng quê Việt Nam.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 7,
            'publisher_id' => 5,
            'description' => " Tác phẩm gợi nhớ về một thời tuổi thơ hồn nhiên, với những trò chơi, tình bạn và những rung động đầu đời. Với ngôn ngữ mộc mạc và cảm xúc chân thành, cuốn sách đã chạm đến trái tim của nhiều độc giả",
            'price' => 100000,
            'cover_image' => "toi-thay-hoa-vang-tren-co-xanh.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Những Thiên Đường Mù',
            'summary' => "Cuộc sống của một phụ nữ trẻ trong bối cảnh xã hội Việt Nam sau chiến tranh, đối mặt với những mâu thuẫn gia đình và xã hội.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 8,
            'publisher_id' => 6,
            'description' => "Tác phẩm phản ánh sâu sắc những bất công và áp lực trong xã hội, đặc biệt là đối với phụ nữ. Với lối viết chân thực và cảm xúc, cuốn sách là một lời kêu gọi về sự tự do và quyền được sống đúng với bản thân.",
            'price' => 110000,
            'cover_image' => "nhung-thien-duong-mu.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Vang Bóng Một Thời',
            'summary' => " Tập hợp những truyện ngắn phản ánh vẻ đẹp của văn hóa truyền thống Việt Nam, từ phong tục đến con người.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 9,
            'publisher_id' => 3,
            'description' => "Với ngôn ngữ tinh tế và hình ảnh sống động, tác giả tái hiện một thời kỳ vàng son của văn hóa Việt, gợi nhớ về những giá trị truyền thống đang dần mai một. Cuốn sách là một bản tình ca dành cho những ai yêu mến văn hóa dân tộc.",
            'price' => 95000,
            'cover_image' => "vang-bong-mot-thoi.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Trên Đường Băng',
            'summary' => "Cuốn sách là tập hợp những bài viết ngắn gọn, hài hước và sâu sắc, truyền cảm hứng cho giới trẻ Việt Nam trong việc học tập, làm việc và phát triển bản thân.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 10,
            'publisher_id' => 5,
            'description' => "Trên Đường Băng không chỉ là những câu chuyện đời thường mà còn là những bài học quý giá về thái độ sống tích cực, sự nỗ lực không ngừng và khát vọng vươn lên. Tác giả sử dụng lối viết gần gũi, dí dỏm để truyền tải thông điệp mạnh mẽ về việc tự tin bước ra thế giới, giống như chiếc máy bay cần chạy đà trên đường băng trước khi cất cánh.",
            'price' => 75000,
            'cover_image' => "tren-duong-bang.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Tôi Tài Giỏi, Bạn Cũng Thế',
            'summary' => "Cuốn sách là tập hợp những bài viết ngắn gọn, hài hước và sâu sắc, truyền cảm hứng cho giới trẻ Việt Nam trong việc học tập, làm việc và phát triển bản thân.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 11,
            'publisher_id' => 6,
            'description' => "Trên Đường Băng không chỉ là những câu chuyện đời thường mà còn là những bài học quý giá về thái độ sống tích cực, sự nỗ lực không ngừng và khát vọng vươn lên. Tác giả sử dụng lối viết gần gũi, dí dỏm để truyền tải thông điệp mạnh mẽ về việc tự tin bước ra thế giới, giống như chiếc máy bay cần chạy đà trên đường băng trước khi cất cánh.",
            'price' => 110000,
            'cover_image' => "toi-tai-gioi-ban-cung-the.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Thị Thành Ký',
            'summary' => "Tập hợp những bài viết ngắn phản ánh các khía cạnh đời sống đô thị hiện đại, từ những điều nhỏ nhặt đến các vấn đề xã hội lớn hơn.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 12,
            'publisher_id' => 7,
            'description' => "Thị Thành Ký là bức tranh sinh động về cuộc sống đô thị với những câu chuyện đời thường, phản ánh thói quen, lối sống và những thay đổi trong xã hội hiện đại. Di Li sử dụng lối viết sắc sảo, hài hước để phơi bày những mặt trái của đô thị hóa và mối quan hệ giữa con người với nhau trong môi trường đô thị.",
            'price' => 60000,
            'cover_image' => "thi-thanh-ky.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Học Khôn Ngoan Mà Không Gian Nan',
            'summary' => "Cuốn sách cung cấp các phương pháp học tập hiệu quả, giúp người đọc học thông minh hơn và đạt kết quả cao mà không cần quá vất vả.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 13,
            'publisher_id' => 8,
            'description' => "Tác giả chia sẻ những kỹ thuật học tập như cách ghi nhớ, quản lý thời gian, tạo động lực và phương pháp ôn luyện hiệu quả. Cuốn sách là công cụ hữu ích cho học sinh, sinh viên và những ai muốn nâng cao hiệu suất học tập mà không cảm thấy áp lực",
            'price' => 89000,
            'cover_image' => "hoc-khon-ngoan-ma-khong-gian-nan.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Chuyện Hay Sử Việt',
            'summary' => "Bộ sách gồm 10 tập kể lại những câu chuyện lịch sử Việt Nam một cách sinh động và dễ hiểu, phù hợp với độc giả trẻ.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 14,
            'publisher_id' => 1,
            'description' => "Chuyện Hay Sử Việt tái hiện các sự kiện lịch sử, nhân vật anh hùng và truyền thuyết dân gian bằng ngôn ngữ giản dị, hấp dẫn. Bộ sách giúp độc giả trẻ hiểu và yêu lịch sử nước nhà, khơi dậy lòng tự hào dân tộc và ý thức bảo vệ di sản văn hóa.",
            'price' => 60000,
            'cover_image' => "chuyen-hay-su-viet.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Mũ Nồi Xanh Việt Nam',
            'summary' => " Hồi ký của một sĩ quan Việt Nam tham gia lực lượng gìn giữ hòa bình Liên Hợp Quốc tại Nam Sudan, chia sẻ những trải nghiệm và cảm xúc trong hành trình đặc biệt này.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 15,
            'publisher_id' => 1,
            'description' => "Cuốn sách mang đến góc nhìn chân thực về công việc và cuộc sống của những người lính Việt Nam trong sứ mệnh quốc tế. Tác giả kể lại những câu chuyện cảm động, những thử thách và niềm tự hào khi góp phần xây dựng hòa bình ở vùng đất xa lạ, qua đó thể hiện hình ảnh người lính Việt Nam hiện đại, chuyên nghiệp và nhân văn.",
            'price' => 100000,
            'cover_image' => "mu-noi-xanh-viet-nam.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Ký Họa Trong Chiến Hào',
            'summary' => "Nhật ký chiến tranh của họa sĩ - phóng viên Phạm Thanh Tâm trong chiến dịch Điện Biên Phủ, ghi lại bằng tranh và lời kể chân thực.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 16,
            'publisher_id' => 1,
            'description' => "Cuốn sách là tập hợp những bức ký họa và ghi chép của tác giả trong thời gian tham gia chiến dịch Điện Biên Phủ. Những hình ảnh sống động và lời kể chân thực mang đến cái nhìn sâu sắc về cuộc sống, chiến đấu và tinh thần của người lính trong một giai đoạn lịch sử hào hùng của dân tộc.",
            'price' => 120000,
            'cover_image' => "ky-hoa-trong-chien-hao.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'title' => 'Sống',
            'summary' => "Tiểu thuyết bằng tranh kể về hành trình sống và những lựa chọn của con người trong xã hội hiện đại, với lối kể chuyện độc đáo và hình ảnh ấn tượng.",
            'published_date' => now()->subDays(rand(0, 365)), // Random published date within the last year 
            'author_id' => 17,
            'publisher_id' => 1,
            'description' => "Sống là sự kết hợp giữa văn học và nghệ thuật thị giác, mở ra hai tuyến thời gian song song với các nhân vật có mối liên hệ chặt chẽ. Cuốn sách khám phá những khía cạnh sâu sắc của cuộc sống, tình yêu, mất mát và hy vọng, mang đến trải nghiệm đọc mới mẻ và đầy cảm xúc.",
            'price' => 150000,
            'cover_image' => "song.png",
            'volume_sold' => rand(0, 500),
            'created_at' => now(),
            'updated_at' => now(),
        ]);




        

        


    }
}
