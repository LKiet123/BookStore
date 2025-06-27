<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::table('authors')->insert([
            'author_name' => 'Tô Hoài', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'ToHoai.png',
            'birth_date' => '1920-09-27', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Nguyễn Sen, thường được biết đến với bút danh Tô Hoài (27 tháng 9 năm 1920 – 6 tháng 7 năm 2014), là một nhà văn người Việt Nam.
Ông được nhà nước Việt Nam trao tặng Giải thưởng Hồ Chí Minh về Văn học – Nghệ thuật đợt 1 (1996) cho các tác phẩm: Xóm giếng, Nhà nghèo, O chuột, Dế mèn phiêu lưu ký, Núi Cứu quốc, Truyện Tây Bắc, Mười năm, Xuống làng, Vỡ tỉnh, Tào lường, Họ Giàng ở Phìn Sa, Miền Tây, Vợ chồng A Phủ, Tuổi trẻ Hoàng Văn Thụ. Một số tác phẩm đề tài thiếu nhi của ông được dịch ra nhiều ngoại ngữ khác nhau.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Phùng Quán', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'PhungQuan.png',
            'birth_date' => '1932-01-01', // Ngày sinh của tác giả
            'hometown' => 'Thừa Thiên Huế', // Quê quán của tác giả
            'bio' => 'Phùng Quán sinh tháng 1 năm 1932, tại xã Thủy Dương, huyện Hương Thủy, tỉnh Thừa Thiên, (nay là phường Thủy Dương, thị xã Hương Thủy,  tỉnh Thừa Thiên – Huế).
Năm 1945, Phùng Quán tham gia Vệ quốc quân, là chiến sĩ trinh sát Trung đoàn 101 (tiền thân là Trung đoàn Trần Cao Vân). Sau đó ông tham gia Thiếu sinh quân Liên khu IV, đoàn Văn công Liên khu IV.[1]
Đầu năm 1954, ông làm việc tại Cơ quan sinh hoạt Văn nghệ quân đội thuộc Tổng cục Chính trị Quân đội Nhân dân Việt Nam (tiền thân của Tạp chí Văn nghệ Quân đội).[1]
Ông là hội viên sáng lập Hội Nhà văn Việt Nam từ năm 1957.
Ông mất ngày 22 tháng 1 năm 1995 tại Hà Nội. Năm 2010, sau khi vợ ông mất, thể theo nguyện vọng của ông lúc sinh thời, gia đình và bạn bè đã đưa hài cốt ông bà về an táng tại quê nhà: phường Thủy Dương, thị xã Hương Thủy, tỉnh Thừa Thiên Huế.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Bảo Ninh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'BaoNinh.png',
            'birth_date' => '1952-10-18', // Ngày sinh của tác giả
            'hometown' => 'Quảng Bình', // Quê quán của tác giả
            'bio' => 'Bảo Ninh tên thật là Hoàng Ấu Phương, sinh tại huyện Diễn Châu, tỉnh Nghệ An, quê ở xã Bảo Ninh, huyện Quảng Ninh (nay thuộc thành phố Đồng Hới), tỉnh Quảng Bình, Việt Nam. Ông là con trai của Giáo sư Hoàng Tuệ (1922 - 1999), nguyên Viện trưởng Viện Ngôn ngữ học. Ông từng là học sinh trường Bưởi - Chu Văn An.
Ông vào bộ đội năm 1969. Thời chiến tranh, ông chiến đấu ở mặt trận B-3 Tây Nguyên, tại tiểu đoàn 5, trung đoàn 24, sư đoàn 10. Năm 1975, ông giải ngũ. Từ 1976-1981 học đại học ở Hà Nội, sau đó làm việc ở Viện Khoa học Việt Nam. Từ 1984-1986 học khoá 2 Trường viết văn Nguyễn Du. Làm việc tại báo Văn nghệ Trẻ. Là hội viên Hội Nhà văn Việt Nam từ 1997.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Vũ Trọng Phụng', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'VuTrongPhung.png',
            'birth_date' => '1912-10-20', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Vũ Trọng Phụng (1912-1939) là một nhà văn, nhà báo nổi tiếng của Việt Nam vào đầu thế kỷ 20. Tuy thời gian cầm bút rất ngắn ngủi, với tác phẩm đầu tay là truyện ngắn Chống nạng lên đường đăng trên Ngọ báo vào năm 1930, ông đã để lại một kho tác phẩm đáng kinh ngạc: hơn 30 truyện ngắn, 9 tập tiểu thuyết, 9 tập phóng sự, 7 vở kịch, cùng một bản dịch vở kịch từ tiếng Pháp, một số bài viết phê bình, tranh luận văn học và hàng trăm bài báo viết về các vấn đề chính trị, xã hội, văn hóa. Một số trích đoạn tác phẩm của ông trong các tác phẩm Số đỏ và Giông Tố đã được đưa vào sách giáo khoa môn Ngữ văn của Việt Nam
Nổi tiếng với giọng văn trào phúng châm biếm xã hội của mình, một số người đã so sánh ông như Balzac của Việt Nam[4]. Tuy nhiên, cũng vì phong cách "tả chân" và yếu tố tình dục trong tác phẩm mà khi sinh thời ông đã bị chính quyền bảo hộ Pháp tại Hà Nội gọi ra tòa vì "tội tổn thương phong hóa" (outrage aux bonnes moeurs)[5]. Về sau này, tác phẩm của ông lại bị cấm xuất bản vì là "tác phẩm suy đồi" tại miền Bắc Việt Nam từ năm 1954 và cả nước từ ngày 30 tháng 4 năm 1975 cho đến tận cuối những năm 1980 mới được chính quyền cho lưu hành', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Du', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'NguyenDu.png',
            'birth_date' => '1766-01-03', // Ngày sinh của tác giả
            'hometown' => 'Hà Tĩnh', // Quê quán của tác giả
            'bio' => 'Nguyễn Du (chữ Hán: 阮攸; 3 tháng 1 năm 1766 – 16 tháng 9 năm 1820[1]) tên tự là Tố Như (素如), hiệu là Thanh Hiên (清軒), biệt hiệu là Hồng Sơn lạp hộ (鴻山獵戶), Nam Hải điếu đồ (南海釣屠), là một nhà thơ, nhà văn hóa lớn thời Lê mạt Nguyễn sơ ở Việt Nam. Ông được người Việt kính trọng tôn xưng là "Đại thi hào dân tộc"[2] và được UNESCO vinh danh là "Danh nhân văn hóa thế giới".[3]
Tác phẩm Truyện Kiều của ông được xem là một kiệt tác văn học, một trong những thành tựu tiêu biểu nhất trong nền văn học trung đại Việt Nam.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Minh Niệm', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'MinhNiem.png',
            'birth_date' => '1975-01-01', // Ngày sinh của tác giả
            'hometown' => 'Bình Định', // Quê quán của tác giả
            'bio' => 'Minh Niệm là một thiền sư, tác giả và diễn giả người Việt Nam, nổi bật với các hoạt động hướng dẫn thiền, chánh niệm và chữa lành tâm lý. Từng tu học trong truyền thống Thiền Làng Mai dưới sự hướng dẫn của Thiền sư Thích Nhất Hạnh, ông là tác giả của cuốn sách bestseller Hiểu về trái tim và người sáng lập nhiều chương trình thiền – chuyển hóa tâm lý tại Việt Nam. Thầy cũng được biết đến qua các podcast và khóa tu lan tỏa tinh thần sống tỉnh thức và yêu thương.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Nhật Ánh',
            'cover_image' => 'NguyenNhatAnh.png',
            'birth_date' => '1955-05-07', // Ngày sinh của tác giả
            'hometown' => 'Quảng Nam', // Quê quán của tác giả
            'bio' => 'Nguyễn Nhật Ánh (sinh ngày 7 tháng 5 năm 1955 tại làng Đo Đo, xã Bình Quế, huyện Thăng Bình, tỉnh Quảng Nam) là một trong những nhà văn đương đại nổi bật của Việt Nam, chuyên viết cho thiếu nhi và tuổi mới lớn. Với phong cách kể chuyện giản dị, hóm hỉnh và giàu cảm xúc, ông đã chạm đến trái tim của hàng triệu độc giả qua hơn 100 tác phẩm văn học.
Ông bắt đầu sự nghiệp văn chương từ năm 13 tuổi với bài thơ đầu tiên được đăng báo. Tác phẩm truyện dài đầu tay Trước vòng chung kết xuất bản năm 1985 đã đánh dấu bước ngoặt quan trọng trong sự nghiệp của ông. Tên tuổi của Nguyễn Nhật Ánh gắn liền với những tác phẩm nổi tiếng như Kính vạn hoa, Cho tôi xin một vé đi tuổi thơ, Mắt biếc, Cô gái đến từ hôm qua, và Tôi thấy hoa vàng trên cỏ xanh. Nhiều tác phẩm của ông đã được chuyển thể thành phim và đạt được thành công lớn.
Năm 2010, ông được trao Giải thưởng Văn học Đông Nam Á (S.E.A. Write Award) cho tác phẩm Cho tôi xin một vé đi tuổi thơ. Hiện tại, ông sống và làm việc tại TP.HCM, tiếp tục sáng tác và truyền cảm hứng cho nhiều thế hệ độc giả', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Dương Thu Hương', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'DuongThuHuong.png',
            'birth_date' => '1947-01-01', // Ngày sinh của tác giả
            'hometown' => 'Thái Bình', // Quê quán của tác giả
            'bio' => 'Dương Thu Hương (sinh năm 1947 tại Thái Bình) là một nhà văn và nhà hoạt động chính trị nổi bật của Việt Nam. Bà từng tham gia chiến tranh với vai trò thành viên đội thanh niên xung phong, hoạt động tại vùng Bình Trị Thiên trong suốt bảy năm, nơi bị bom đạn tàn phá nặng nề. Sau khi chiến tranh kết thúc, bà trở thành một trong những cây bút tiêu biểu, với các tác phẩm phản ánh sâu sắc hiện thực xã hội và thân phận con người.
Những tiểu thuyết nổi tiếng của bà bao gồm Những thiên đường mù (1988), Tiểu thuyết vô đề (1991), Chốn vắng (2002) và Đỉnh cao chói lọi (2009). Tác phẩm của bà thường bị kiểm duyệt và cấm xuất bản tại Việt Nam do nội dung phê phán chính trị, nhưng lại được đón nhận rộng rãi ở nước ngoài và dịch ra nhiều ngôn ngữ.
Vì những quan điểm chính trị thẳng thắn, bà bị khai trừ khỏi Đảng Cộng sản Việt Nam năm 1989 và từng bị giam giữ. Từ năm 2006, bà sống lưu vong tại Paris, Pháp. Bà đã nhận được nhiều giải thưởng quốc tế, trong đó có Huân chương Văn hóa Nghệ thuật Chevalier des Arts et des Lettres (1994), Giải thưởng Prince Claus (2001) và Giải thưởng Cino Del Duca (2023) do Viện Hàn lâm Pháp trao tặng, ghi nhận những đóng góp của bà cho văn học và nhân quyền.
', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Tuân', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'NguyenTuan.png',
            'birth_date' => '1910-07-10', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Nguyễn Tuân (10/7/1910 – 28/7/1987) là một trong những nhà văn lớn của văn học Việt Nam hiện đại, nổi bật với thể loại tùy bút và bút ký. Ông được mệnh danh là "ông vua tùy bút" và là biểu tượng của người nghệ sĩ tài hoa, uyên bác, suốt đời đi tìm cái đẹp trong cuộc sống và nghệ thuật.
Sinh ra tại phố Hàng Bạc, Hà Nội, trong một gia đình nhà Nho, Nguyễn Tuân trưởng thành trong bối cảnh Hán học suy tàn. Ông học đến cuối bậc Thành chung ở Nam Định thì bị đuổi học vì tham gia bãi khóa phản đối giáo viên Pháp xúc phạm người Việt (1929). Sau đó, ông bị bắt giam vì vượt biên sang Thái Lan không giấy phép. Sau khi ra tù, ông bắt đầu sự nghiệp viết văn.
Nguyễn Tuân bắt đầu viết từ năm 1935, nhưng đến năm 1938 mới gây tiếng vang với các tác phẩm như Vang bóng một thời, Một chuyến đi, Chiếc lư đồng mắt cua. Sau Cách mạng Tháng Tám 1945, ông gia nhập Hội Nhà văn Việt Nam và giữ chức Tổng thư ký từ 1948 đến 1958. Ông tiếp tục sáng tác với nhiều tác phẩm nổi tiếng như Sông Đà (1960), Hà Nội ta đánh Mỹ giỏi (1972), Tờ hoa (1966). 
Nguyễn Tuân là bậc thầy trong việc sử dụng và sáng tạo tiếng Việt, với phong cách nghệ thuật độc đáo và sâu sắc. Phong cách ấy có thể thâu tóm trong mấy chữ: phóng túng, tài hoa và uyên bác. Ông theo đuổi "chủ nghĩa xê dịch", luôn khao khát khám phá, trải nghiệm để tìm kiếm cái đẹp và sự mới lạ trong cuộc sống. 
Năm 1996, ông được Nhà nước Việt Nam truy tặng Giải thưởng Hồ Chí Minh về văn học nghệ thuật', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Tony Buổi Sáng', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'TonyBuoiSang.png',
            'birth_date' => '1980-01-01', // Ngày sinh của tác giả
            'hometown' => 'Hải Phòng', // Quê quán của tác giả
            'bio' => 'Tony Buổi Sáng là bút danh của một tác giả ẩn danh người Việt, nổi bật với hai cuốn sách truyền cảm hứng: Cà phê cùng Tony và Trên đường băng. Với lối viết hài hước, sâu sắc và gần gũi, Tony chia sẻ những câu chuyện đời thường, bài học về khởi nghiệp, phát triển bản thân và lối sống tích cực, đặc biệt hướng đến giới trẻ Việt Nam.
Tác giả tự xưng là “Dượng” – một cách gọi thân mật trong gia đình miền Nam – để tạo cảm giác gần gũi, như một người anh lớn chia sẻ kinh nghiệm sống. Tony chọn cách ẩn danh, không tiết lộ danh tính thật và tránh xuất hiện trên truyền thông, với quan điểm rằng việc giữ kín danh tính giúp tập trung vào nội dung và thông điệp hơn là con người cụ thể .
Ngoài viết sách, Tony còn truyền cảm hứng cho nhiều hoạt động thiện nguyện và phát triển cộng đồng. Quỹ Tony Buổi Sáng được thành lập nhằm hỗ trợ khởi nghiệp, đặc biệt cho học sinh trường nghề, thông qua việc hướng dẫn cách làm và hỗ trợ tài chính. Các hoạt động của quỹ tập trung vào việc giúp đỡ người nghèo khó, vùng sâu vùng xa, và lan tỏa tinh thần sống tích cực, trách nhiệm với bản thân và cộng đồng .
Dù danh tính thật vẫn là điều bí ẩn, nhưng những bài viết và hoạt động của Tony Buổi Sáng đã tạo nên một hiện tượng văn hóa tích cực, truyền cảm hứng cho hàng triệu bạn trẻ Việt Nam.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Adam Khoo', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'AdamKhoo.png',
            'birth_date' => '1974-04-08', // Ngày sinh của tác giả
            'hometown' => 'Singapore', // Quê quán của tác giả
            'bio' => 'Adam Khoo là một doanh nhân, tác giả và nhà đào tạo người Singapore, nổi bật trong lĩnh vực giáo dục tài chính và phát triển bản thân. Sinh ngày 8 tháng 4 năm 1974, ông từng là học sinh có thành tích kém nhưng đã vươn lên trở thành triệu phú tự thân ở tuổi 26.
Ông là người sáng lập và Chủ tịch điều hành của Adam Khoo Learning Technologies Group (AKLTG), một trong những tổ chức đào tạo lớn nhất châu Á, cung cấp các chương trình về kỹ năng học tập, phát triển cá nhân và đầu tư tài chính. Năm 2017, ông thành lập Piranha Profits, một trường học trực tuyến dành cho nhà đầu tư và giao dịch viên toàn cầu.
Adam Khoo đã viết hơn 16 cuốn sách bán chạy, bao gồm Tôi tài giỏi, bạn cũng thế! và Chiến thắng trò chơi chứng khoán, được dịch ra 12 ngôn ngữ và bán hơn 500.000 bản trên toàn thế giới. Ông cũng là một nhà đầu tư thành công, phát triển chiến lược Value Momentum Investing™, kết hợp phân tích cơ bản và kỹ thuật.
Với hơn 1 triệu người theo dõi trên YouTube và hàng chục triệu lượt xem, Adam Khoo là một trong những nhà giáo dục tài chính có ảnh hưởng nhất châu Á, truyền cảm hứng cho hàng triệu người qua các khóa học, sách và video của mình.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Di Li', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'DiLi.png',
            'birth_date' => '1978-06-03', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Di Li (tên thật Nguyễn Diệu Linh, sinh năm 1978 tại Hà Nội) là nhà văn, dịch giả và giảng viên tiếng Anh nổi tiếng của Việt Nam. Cô nổi bật với dòng tiểu thuyết trinh thám – kinh dị, đặc biệt là cuốn Trại hoa đỏ (2009). Bên cạnh viết văn, Di Li còn là chuyên gia quan hệ công chúng với gần 20 năm kinh nghiệm và tác giả các sách về PR. Hiện cô là giảng viên tại Trường Cao đẳng Thương mại và Du lịch Hà Nội, đồng thời là hội viên Hội Nhà văn Việt Nam. Di Li được đánh giá là cây bút nữ tiên phong làm mới thể loại trinh thám trong văn học Việt Nam.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Kevin Paul', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'KevinPaul.png',
            'birth_date' => '1980-01-01', // Ngày sinh của tác giả
            'hometown' => 'Victoria, Canada', // Quê quán của tác giả
            'bio' => 'Kevin Paul là tác giả và chuyên gia giáo dục có tiếng, nổi bật với cuốn sách Học khôn ngoan mà không gian nan (Study Smarter, Not Harder) – một trong những tác phẩm được dịch ra nhiều thứ tiếng và sử dụng rộng rãi trong giáo dục toàn cầu. Ông tốt nghiệp Đại học Victoria (Canada) và có nhiều năm kinh nghiệm làm việc trong giáo dục đại học, từng giữ các vị trí quản lý và giảng dạy về kỹ năng học tập. Kevin Paul đã tổ chức hàng ngàn buổi hội thảo và khóa đào tạo giúp sinh viên tối ưu hóa phương pháp học, nghiên cứu hiệu quả hơn, từ đó nâng cao thành tích học tập. Ngoài ra, ông còn là tác giả của nhiều cuốn sách khác về kỹ năng nghiên cứu và quản lý cuộc họp.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Như Mai', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'NguyenNhuMai.png',
            'birth_date' => '1941-01-01', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Nguyễn Như Mai (sinh năm 1941) là nhà báo, tác giả và cố vấn truyền hình nổi tiếng của Việt Nam. Ông từng là Trưởng ban biên tập đầu tiên của báo Hoa Học Trò, một tạp chí dành cho học sinh được yêu thích rộng rãi. Nguyễn Như Mai đã sáng tác gần 100 đầu sách dành cho thiếu nhi và thanh thiếu niên, tập trung vào các chủ đề lịch sử, thiên nhiên và văn hóa Việt Nam. Bên cạnh đó, ông còn tham gia cố vấn nhiều chương trình truyền hình giáo dục nổi bật như Đường lên đỉnh Olympia, Ai là triệu phú, 7 sắc cầu vồng và Trạng nguyên nhí, góp phần nâng cao chất lượng nội dung và truyền cảm hứng học tập cho thế hệ trẻ. Với phong cách viết gần gũi, dễ hiểu và giàu tính giáo dục, ông được xem là người thầy, người bạn đồng hành đáng kính trong lòng nhiều thế hệ học sinh Việt Nam.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Nguyễn Sỹ Công', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'NguyenSyCong.png',
            'birth_date' => '1995-01-01', // Ngày sinh của tác giả
            'hometown' => 'Hà Tĩnh', // Quê quán của tác giả
            'bio' => 'Nguyễn Sỹ Công, Trung úy Lực lượng gìn giữ hòa bình Liên Hợp QuốcTrung úy Công đang làm việc tại Bệnh viện dã chiến cấp 2 số 4 của căn cứ quân sự Juba Compund Bentiu, Nam Sudan. 
Anh thường quay những đoạn clip cập nhật về cuộc sống của người dân địa phương nơi đây, những hành động đẹp của người lính mũ nồi xanh Việt Nam khi khám, chữa bệnh cho người dân, hướng dẫn họ trồng trọt để có thêm nguồn lương thực, dạy học cho các em nhỏ.', // Tiểu sử ngắn cho tác giả // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Phạm Thanh Tâm', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'PhamThanhTam.png',
            'birth_date' => '1987-01-10', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Phạm Thanh Tâm (sinh ngày 10/01/1987) là một giảng viên – nhà nghiên cứu Toán học người Việt Nam, hiện giữ chức vụ Trưởng bộ môn Hình học thuộc Khoa Toán học, Trường Đại học Sư phạm Hà Nội 2. Ông là chuyên gia trong các lĩnh vực lý thuyết đại số, mô-đun, liên thông kỳ dị và gói Higgs – những nhánh nghiên cứu có ý nghĩa trong hình học đại số và hình học vi phân hiện đại.
Ông tốt nghiệp cử nhân Toán học tại Trường Đại học Sư phạm Hà Nội 2 (2009), bảo vệ luận văn "Vành Noether và ứng dụng" dưới sự hướng dẫn của ThS. Phạm Lương Bằng. Sau đó, ông nhận bằng Thạc sĩ Toán học từ Viện Toán học, Viện Hàn lâm Khoa học và Công nghệ Việt Nam (2012), với đề tài "Đường cong elliptic trên trường hữu hạn", hướng dẫn bởi GS.TSKH. Phùng Hồ Hải. Hiện tại, ông là nghiên cứu sinh tại chính Viện này với đề tài "Về liên thông kỳ dị chính quy trên lược đồ trên một vành".', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('authors')->insert([
            'author_name' => 'Hải Anh', // Tên tác giả dạng "Author 1", "Author 2", ...
            'cover_image' => 'HaiAnh.png',
            'birth_date' => '1932-01-01', // Ngày sinh của tác giả
            'hometown' => 'Hà Nội', // Quê quán của tác giả
            'bio' => 'Phạm Thanh Tâm (1932 – 2019), bút danh Huỳnh Biếc, là một họa sĩ, nhà báo và chiến sĩ cách mạng nổi tiếng của Việt Nam, được xem là một trong những họa sĩ chiến trường tiêu biểu nhất trong hai cuộc kháng chiến chống Pháp và Mỹ.
Ông sinh tại Hải Phòng, quê gốc Nam Định, tham gia kháng chiến từ năm 1950 với vai trò phóng viên và họa sĩ tại báo Quyết Thắng thuộc Đại đoàn pháo binh 351. Ông trực tiếp tham gia và ghi chép chiến dịch Điện Biên Phủ, chiến dịch Hồ Chí Minh và nhiều mặt trận lớn bằng tranh ký họa và nhật ký.
Sau 1975, ông là Giám đốc Xưởng Mỹ thuật Quân đội và được phong hàm Đại tá. Tác phẩm nổi bật nhất của ông là "Ký họa trong chiến hào" (Drawing Under Fire), được xuất bản ở Mỹ, Pháp và Việt Nam, thể hiện giá trị nghệ thuật và tư liệu quý về chiến tranh. Ông là hội viên sáng lập của Hội Mỹ thuật và Hội Nhà báo Việt Nam.
Phạm Thanh Tâm để lại dấu ấn sâu đậm trong nghệ thuật và lịch sử hiện đại Việt Nam với những tác phẩm đầy cảm xúc và giá trị tư liệu vô giá.', // Tiểu sử ngắn cho tác giả
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
