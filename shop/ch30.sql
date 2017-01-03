-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 17, 2010, 06:45 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `ch30`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `commerical_software`
-- 

CREATE TABLE `commerical_software` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(256) collate utf8_unicode_ci NOT NULL,
  `author` varchar(256) collate utf8_unicode_ci default NULL,
  `translator` varchar(256) collate utf8_unicode_ci default NULL,
  `contents` text collate utf8_unicode_ci,
  `feature` text collate utf8_unicode_ci,
  `cd` tinyint(4) default '0',
  `publishdate` date NOT NULL,
  `price` smallint(6) default '0',
  `discount` tinyint(4) default '100',
  `saleprice` smallint(6) default '0',
  `item_index` varchar(12) collate utf8_unicode_ci NOT NULL,
  `photo` varchar(256) collate utf8_unicode_ci default NULL,
  `publisher` varchar(64) collate utf8_unicode_ci default NULL,
  `color` tinyint(4) default '0',
  `category` varchar(20) collate utf8_unicode_ci default NULL,
  `category_type` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- 列出以下資料庫的數據： `commerical_software`
-- 

INSERT INTO `commerical_software` VALUES (1, 'Windows Vista 中文旗艦升級版', '微軟', NULL, NULL, 'Windows Vista 旗艦版是功能最齊全的 Windows Vista 版本。 這是第一套結合業務導向作業系統的所有先進基礎結構功能、行動導向作業系統的所有管理與高效率功能，以及消費者導向作業系統的所有數位娛樂功能的作業系統。 若您希望擁有一套適合在家工作使用，同時也適合在外出差時使用，而且還能提供娛樂功能的作業系統，Windows Vista 旗艦版正是能滿足您所有需求的 作業系統。\r\n\r\n在家工作 \r\nWindows Vista 旗艦版具備讓您從遠端輕鬆連線到企業網路所需的一切功能。 因此即使是在家工作，也能擁有先進的網路連線功能，例如：加入網域、支援群組原則，以及遠端桌面等功能。 Windows Vista 旗艦版還包含 Windows BitLocker™ Drive Encryption 技術，可提供更高等級的防護功能，無論您是在家中、在外奔波或在辦公室中，都能防止您的重要業務資料遭竊。 \r\n\r\n最先進的娛樂功能\r\nWindows Vista 旗艦版可提供 Windows Vista 家用進階版所包含的所有娛樂功能。 它包含欣賞數位相片、音樂、電影、類比電視，甚至 HDTV 等最新型態數位內容所需的全部功能。 Windows Vista 旗艦版還擁有極為出色的工具，例如：Windows Photo Gallery 與 Windows Movie Maker HD，可提供所有必備的功能讓您收集、管理及編輯您的數位內容。 此外，它還包含 Windows Media Center，可讓您的電腦搖身一變，成為全功能的家庭娛樂中心。 \r\n\r\n不用妥協 \r\nWindows Vista 旗艦版可提供企業使用者與家庭使用者所需的一切功能。 對於無論在公司、在外奔波或在家工作時都需要使用電腦的小型企業主，這是非常理想的解決方案。 若您需要一台家用電腦主要用於娛樂功能，但是又必須處理業務，像是連線到企業網路，這也是十分理想的解決方案。 \r\n\r\n如果您想同時擁有所有最出色的業務功能、所有最出色的行動功能，以及所有最出色的家庭娛樂功能，Windows Vista 旗艦版正是您需要的解決方案。 使用 Windows Vista 旗艦版，您完全不必妥協。', 1, '2007-03-01', 8890, 99, 8800, '1001000000', '100100000061.jpg', '文魁圖書', 0, '商用軟體', '作業系統');
INSERT INTO `commerical_software` VALUES (2, 'Windows Vista 家用入門中文升級版', '微軟', NULL, NULL, '對於具有基本電腦需求的家庭，Windows Vista 家用入門版是最理想的作業系統。 它非常容易安裝，能讓您更安全、更穩定地使用您的電腦，而且就像所有版本的 Windows Vista 一樣，它能與多種您常用且信賴的軟體、裝置及服務相容。 如果您需要的電腦功能只是上網瀏覽、收發電子郵件與朋友及家人聯繫，或是進行基本的文件編寫等等，Windows Vista 家用入門版將能提供更安全、更可靠、更具生產力的運算環境。 \r\n\r\n安全可靠 \r\nWindows Vista 的目標是成為 Microsoft 有史以來最安全的作業系統。 每一種版本的 Windows Vista，包括 Windows Vista 家用入門版在內，都提供必要的工具與技術來保護您的安全，無論是上網瀏覽、連線到無線網路或只是讀取電子郵件，均是如此。 所有版本的 Windows Vista 都包含新工具，可及早警告您即將發生的硬體失敗，避免您遺失任何重要的個人資料。 此外，所有 Windows Vista 版本也都包含家長監護功能，可讓您管理及監控家人使用電腦的情形，包括遊戲、網際網路、立即訊息及其他可能引發家長關切的活動。 Windows Vista 家用入門版的設計可讓您與您的家人專注於對您最重要的層面，減少擔憂安全問題的時間。 \r\n\r\n安裝容易、使用方便 \r\n相較於其他所有版本的 Windows Vista，Windows Vista 家用入門版大幅簡化了電腦的操作方式。 Windows Vista 家用入門版還有新工具，可協助您將個人檔案與設定值從原有的電腦順利轉移到新的 Vista 電腦上。 此外，Windows Vista 家用入門版在整個作業系統中整合了新的搜尋工具，可協助您迅速且精確地找到您需要的檔案或程式。\r\n\r\nWindows Vista 家用入門版包含所有基本功能，能讓您擁有更容易、更安全、更可靠的運算經驗。 即使您現有的電腦似乎已經足以應付基本工作，例如：讀取電子郵件與上網瀏覽，但是將您的電腦升級到 Windows Vista 家用入門版，或是購買已預先安裝 Windows Vista 家用入門版的電腦，將能提供更出色的電腦使用經驗，您不僅能因此而受惠，而且會更加安心。', 1, '2007-03-01', 3790, 97, 3690, '1001000000', '100100000055.jpg', '文魁圖書', 0, '商用軟體', '作業系統');
INSERT INTO `commerical_software` VALUES (3, '卡巴斯基網路安全包7.0中文版 / 3人', '卡巴斯基', NULL, 'Kaspersky Internet Security 7.0承續前一版所有的優點，加入新的技術來強化掃描速度和效率，並提供更便利的使用者操作介面。 \r\n\r\nKaspersky Internet Security 7.0是一套完整的電腦防護系統，能夠對抗各式各樣的安全威脅，例如惡意程式、駭客滲透、垃圾郵件、rootkits、間諜程式、網路釣魚、彈跳式廣告等。除了防毒軟體之外，KIS包含新一代的駭客防護（個人防火牆），免疫防護元件能夠防護未知的病毒，間諜防護能夠對抗網路詐欺，垃圾郵件防護可以過濾不請自來的電子郵件。\r\n\r\nKaspersky Internet Security 7.0包含數種功能的延伸和防護的改進。因此，新的家長控制模組監控使用者的瀏覽行為，並且禁止存取暴力、色情、毒品等網頁內容，或限制上網時間。間諜防護的保護機密資料防範重要資料被竊取，例如電子郵件地址、密碼、銀行資訊和信用卡號碼。 \r\n\r\n即使新增多種防護功能和無法不包的保護，Kaspersky Internet Security 7.0的設定一樣非常簡單。初學者可以選擇安裝類型和保護模式以符合所需。\r\n\r\nKaspersky Internet Security 7.0 是為了新的Microsoft Windows Vista所開發。它完全相容於32和64位元版本的作業系統。產品的操作介面依循Windows Vista的格式，並且與它的圖型介面環境自然融合成一體。', 'Kaspersky Internet Security 7.0承續前一版所有的優點，加入新的技術來強化掃描速度和效率，並提供更便利的使用者操作介面。 \r\n\r\nKaspersky Internet Security 7.0是一套完整的電腦防護系統，能夠對抗各式各樣的安全威脅，例如惡意程式、駭客滲透、垃圾郵件、rootkits、間諜程式、網路釣魚、彈跳式廣告等。除了防毒軟體之外，KIS包含新一代的駭客防護（個人防火牆），免疫防護元件能夠防護未知的病毒，間諜防護能夠對抗網路詐欺，垃圾郵件防護可以過濾不請自來的電子郵件。\r\n\r\nKaspersky Internet Security 7.0包含數種功能的延伸和防護的改進。因此，新的家長控制模組監控使用者的瀏覽行為，並且禁止存取暴力、色情、毒品等網頁內容，或限制上網時間。間諜防護的保護機密資料防範重要資料被竊取，例如電子郵件地址、密碼、銀行資訊和信用卡號碼。 \r\n\r\n即使新增多種防護功能和無法不包的保護，Kaspersky Internet Security 7.0的設定一樣非常簡單。初學者可以選擇安裝類型和保護模式以符合所需。\r\n\r\nKaspersky Internet Security 7.0 是為了新的Microsoft Windows Vista所開發。它完全相容於32和64位元版本的作業系統。產品的操作介面依循Windows Vista的格式，並且與它的圖型介面環境自然融合成一體。', 1, '2007-09-01', 4300, 99, 4250, '1008000003', '100800000354.jpg', '文魁圖書', 0, '商用軟體', '防毒防駭');
INSERT INTO `commerical_software` VALUES (4, '諾頓360中文版', '諾頓', NULL, 'Norton 360 是一套全方位的防護產品，可保護您、家人、電腦以及資訊，讓您能自由與安心地進行日常的線上活動。這套完善的解決方案結合了賽門鐵克禁得起考驗、領先群倫的安全性、電腦系統調整(微調)技術以及全新的自動備份與反網路釣魚技術，充分地保護您重要的資料，並且協助保護您的身份免於遭到竊取。 Norton 360 是一套完善的安全性解決方案，能提供一套高度自動化的服務，讓您無需要購買與管理多項產品，就能獲得完整的防護，', '軟體特點\r\n\r\n保護電腦免於各種威脅\r\nNorton 360 採用了賽門鐵克領先業界的安全技術，可以攔截許多威脅，包括駭客、病毒、病蟲與木馬程式。Norton 360 也會偵測並封鎖會竊取您身份的間諜程式或是其他會降低電腦執行效能的煩人程式。 \r\n\r\n保護您在上網時免於遭到身份竊取\r\n創新的技術能夠偵測並防止線上詐騙與網路釣魚攻擊，協助保護您的線上身份。Norton 360 會自動驗證熱門的購物與銀行網站，並同時利用進階的偵測技術來偵測詐騙網站，藉以提供零時差的威脅防護。 \r\n\r\n防止重要的檔案遺失 \r\n自動備份與還原功能可以協助確保重要相片、檔案與音樂的安全，讓您能夠隨時與他人共享或欣賞檔案，完全不需擔心檔案會遺失。Norton 360 會自動搜尋任何新的檔案並備份該資料，且同時支援本機 (外接式硬碟、CD/DVD、家庭用網路) 與線上備份位置。一旦設定完畢之後，進行線上備份時，就無需要使用者介入。Norton 360 可讓您輕鬆地將資料儲存至安全的線上儲存服務，當需要時，就可以輕而易舉的還原資訊。 \r\n\r\n微調電腦使其發揮最佳效能\r\n整合式的維護與最佳化工具可以讓您的電腦以最佳狀態執行。Norton 360 會自動為您清除上網後遺留下來的內容 (例如無用檔案或暫存檔)，且會在背景中將磁碟最佳化。 \r\n\r\n提供完全不受干擾的使用者經驗 \r\n簡單易懂的使用者介面能夠藉由明白指出哪些是安全的活動以及 Norton 360 是如何提供持續性的防護，為使用者提供不受干擾的操作經驗。您將不會一再收到煩人的警示，因為 Norton 360 會自動在背景解決多數的安全性、備份與電腦系統調整問題。\r\n\r\n保護您免於受到最新的線上威脅 \r\nNorton 360 是以年度線上更新服務的形式提供，能夠自動為有效的用戶提供病毒定義檔更新以及產品更新，協助保護您免於受到最新的線上威脅。', 1, '2007-06-01', 2790, 96, 2690, '1013000001', '100100000001.jpg', '文魁圖書', 0, '商用軟體', '防毒防駭');
INSERT INTO `commerical_software` VALUES (5, 'Microsoft Office 2007 中文標準版', '微軟', NULL, 'MicrosoftOfficeExcel2007\r\nOutlook2007\r\nPowerPoint2007\r\nWord2007', '內含程式\r\n\r\nMicrosoft Office Excel 2007 \r\nMicrosoft Office Outlook 2007 \r\nMicrosoft Office PowerPoint 2007 \r\nMicrosoft Office Word 2007   \r\n\r\nMicrosoft Office Standard 2007 提供家用及小型企業基本的 Office 軟體套件，讓您可以快速輕鬆地建立美觀的文件、試算表及簡報，以及管理電子郵件。新版本採用全新簡化的使用者介面，顯示您常用而熟悉的命令、強化的圖形和格式設定功能，讓您建立高品質文件；新增有助於管理排程的時間管理工具，並提升可靠性和安全性 (例如改進垃圾電子郵件篩選，以減少垃圾電子郵件)。透過這些增強功能，Office Standard 2007 能夠讓您在家裡或辦公室工作時，更加輕鬆愉快。', 1, '2007-03-01', 14390, 99, 14300, '1002000001', '100200000117.jpg', '文魁圖書', 0, '商用軟體', '文書處理');
INSERT INTO `commerical_software` VALUES (6, 'Microsoft Office 2007中文專業升級版', '微軟', NULL, '內含程式\r\n\r\nMicrosoft Office Access 2007 \r\nMicrosoft Office Excel 2007 \r\nMicrosoft Office Outlook 2007 with Business Contact Manager \r\nMicrosoft Office PowerPoint 2007 \r\nMicrosoft Office Publisher 2007 \r\nMicrosoft Office Word 2007 \r\nMicrosoft Office Professional 2007 是完整的生產力套件和資料庫軟體，可協助您節省時間、有條不紊。強大的連絡人管理功能可以讓您在同一個位置中管理所有潛在和現有客戶的資訊。您可以輕鬆地在公司內部製作適用於列印、電子郵件和網頁的專業行銷資料，並建立有效的行銷活動。您可以迅速建立動態商務文件、試算表和簡報，並且不需要技術人員或具備相關經驗，即可建立資料庫。改良式的功能表會適時自動呈現您需要的工具，幫助您快速學會使用新功能。', '系統需求\r\n\r\n電腦和處理器 500 MHz 處理器以上 \r\n記憶體 256 MB RAM (或以上) \r\n硬碟 1.5 GB；安裝後，如果從硬碟移除原始的下載套件，將會釋放此磁碟空間的一部分。 \r\n磁碟機 CD-ROM 或 DVD 光碟機 \r\n顯示 1024x768 (或以上) 解析度的顯示器 \r\n作業系統 Microsoft Windows(R) XP Service Pack (SP) 2、Windows Server(R) 2003 SP1 或更新版本的作業系統 \r\n其他\r\n特定的筆跡功能需要執行 Microsoft Windows XP Tablet PC Edition 以上。語音辨識功能需要近距離麥克風和音訊輸出裝置。「資訊授權管理」功能需要可存取執行 Windows Rights Management Services 的 Windows 2003 Server SP1 (或以上)。 Outlook 2007 的特定進階功能需要連線到 Microsoft Exchange Server 2000 (或以上)。「動態行事曆」需要伺服器的連線能力。「立即搜尋」需要 Microsoft Windows Desktop Search 3.0。 特定的進階共同作業功能需要連線到執行 Microsoft Windows SharePoint Services 的 Microsoft Windows Server 2003 SP1 (或以上)。特定的進階功能需要 Microsoft Office SharePoint Server 2007。PowerPoint 投影片庫需要 Office SharePoint Server 2007。 Internet Explorer 6.0 (或以上)，僅限使用 32 位元瀏覽器。網際網路功能需要網際網路存取 (可能需收費)。 \r\n附加\r\n根據系統設定和作業系統，實際需求和產品功能可能不同。 \r\n\r\n※以上規格資料若有任何錯誤，以原廠所公佈資料為準。', 1, '2007-03-01', 10990, 99, 10900, '1002000001', '100200000120.jpg', '文魁圖書', 0, '商用軟體', '文書處理');

-- --------------------------------------------------------

-- 
-- 資料表格式： `computer_books`
-- 

CREATE TABLE `computer_books` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(256) collate utf8_unicode_ci NOT NULL,
  `author` varchar(256) collate utf8_unicode_ci default NULL,
  `translator` varchar(256) collate utf8_unicode_ci default NULL,
  `contents` text collate utf8_unicode_ci,
  `feature` text collate utf8_unicode_ci,
  `cd` tinyint(4) default '0',
  `publishdate` date NOT NULL,
  `price` smallint(6) default '0',
  `discount` tinyint(4) default '100',
  `saleprice` smallint(6) default '0',
  `item_index` varchar(12) collate utf8_unicode_ci NOT NULL,
  `photo` varchar(256) collate utf8_unicode_ci default NULL,
  `publisher` varchar(64) collate utf8_unicode_ci default NULL,
  `color` tinyint(4) default '0',
  `category` varchar(20) collate utf8_unicode_ci default NULL,
  `category_type` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

-- 
-- 列出以下資料庫的數據： `computer_books`
-- 

INSERT INTO `computer_books` VALUES (16, '網頁程式設計師--HTML、JavaScript、CSS、XHTML、AjAX', '德瑞工作室', NULL, '第一篇 HTML與XHTML\r\n第一章 網頁設計的基礎\r\n第二章 建立HTML/XHTML網頁\r\n第三章 在網頁中加入文字\r\n第四章 在網頁中加入圖片\r\n第五章 網頁的連結\r\n第六章 表格的製作\r\n第七章 表單與控制項\r\n第八章 使用頁框分割視窗\r\n第九章 在網頁中嵌入多媒體物件\r\n第十章 聲音與影像\r\n第二篇 CSS\r\n第十一章 CSS樣式的基礎\r\n第十二章 CSS選取器\r\n第十三章 字型的CSS樣式\r\n第十四章 文字的CSS樣式\r\n第十五章 顏色的CSS樣式\r\n第十六章 方框的CSS樣式\r\n第十七章 表格的CSS樣式\r\n第十八章 清單的CSS樣式\r\n第十九章 定位的CSS樣式\r\n第二十章 CSS的應用\r\n第三篇 JavaScript\r\n第二十一章 JavaScript的基礎\r\n第二十二章 JavaScript的事件處理與內建物件\r\n第二十三章 JavaScript與DOM\r\n第二十四章 JavaScript與CSS樣式\r\n第二十五章 JavaScript與Cookie\r\n第二十六章 JavaScript與Ajax\r\n第二十七章 Ajax的應用實例\r\n第四篇 建立網站\r\n第二十八章 建置網站\r\n第二十九章 發佈網頁\r\n第五篇 XML\r\n第三十章 XML的基礎\r\n第三十一章 JavaScript與XML\r\n第三十二章 XML應用程式\r\n第六篇 伺服端程式設計\r\n第三十三章 PHP伺服端程式設計\r\n第三十四章 ASP.NET伺服端程式設計\r\n第七篇 附錄', '從本書您可以學到：\r\n* HTML的基本知識\r\n* 最新的網頁語言XHTML\r\n* 網頁設計的基礎與應用\r\n* 如何套用CSS樣式來改變網頁的外觀\r\n* 如何使用JavaScript來產生動態的效果\r\n* XML對網頁的應用有何影響\r\n* 如何建立Ajax的應用程式\r\n* 如何建置網站\r\n* 設計所有瀏覽器都適用的網頁\r\n* 使用PHP與ASP.NET建立伺服端程式\r\n* HTML/XHTML與CSS的快速參考\r\n* 從基礎到實用的所有網頁設計的技術', 1, '2008-11-01', 620, 85, 527, 'W8155', 'W8155.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (15, 'Dreamweaver CS3 &amp; PHP網頁資料庫範例教學---AJAX+CSS', '德瑞工作室', NULL, '第一章 Dreamweaver CS3與PHP的基礎\r\n第二章 Dreamweaver CS3的操作介面\r\n第三章 PHP的基本語法\r\n第四章 PHP的陣列，字串，與函數\r\n第五章 PHP的日期，檔案，與數學函數\r\n第六章 PHP的類別，物件，與錯誤處理\r\n第七章 網頁的文字，圖片，與超連結\r\n第八章 網頁的表格，表單，與頁框\r\n第九章 網頁的AP Div，影音，檔頭標籤，與行為\r\n第十章 CSS樣式表\r\n第十一章 PHP的網頁處理\r\n第十二章 MySQL資料庫系統\r\n第十三章 Dreamweaver的資料庫處理\r\n第十四章 使用Spry建立AJAX頁面\r\n第十五章 發佈網站\r\n第十六章 會員管理系統\r\n第十七章 線上郵寄系統\r\n第十八章 檔案的上傳與下載\r\n第十九章 網路購物\r\n第二十章 聊天室\r\n第二十一章 部落格\r\n附錄A 下載Dreamweaver CS3試用版\r\n附錄B Dreamweaver CS3的擴充功能\r\n附錄C 習題解答', '本書介紹如何使用PHP來搭配Dreamweaver CS3，再加上MySQL資料庫，建構任何大型網頁都能夠輕輕鬆鬆地完成。特別是應用了Dreamweaver CS3的Spry架構，來建立具有AJAX功能的應用程式。另外在CSS樣式上，也增加了許多的篇幅。\r\n\r\n本書的寫作是以圖形加上說明文字的方式來講解，完全沒有長篇大論的枯燥文字。在每一章都提供大量的範例程式，這些範例程式放在書附光碟中，讀者可以直接複製到您的電腦中來使用。\r\n\r\n從本書您可以學到：\r\n* PHP的基本語法\r\n* Dreamweaver CS3的介面用法\r\n* 如何使用PHP來設計網頁\r\n* 如何使用Dreamweaver CS3來編輯網頁\r\n* 如何使用MySQL資料庫\r\n* 如何在Dreamweaver CS3中使用PHP與MySQL來建立網頁資料庫\r\n* 如何應用Dreamweaver CS3的Spry架構，來建立具有AJAX功能的網頁\r\n* 如何設計CSS樣式\r\n* 如何建構自己的網站\r\n* 提供『會員管理系統』，『線上郵寄系統』，『檔案的上傳與下載』，『網路購物』，『聊天室』，以及『部落格』的實例應用', 1, '2008-02-01', 600, 85, 510, 'W8045', 'W8045.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (14, 'Dreamweaver CS3 &amp; ASP.NET網頁資料庫範例教學---AJAX+CSS', '德瑞工作室', NULL, '第1章 Dreamweaver CS3 與ASP.NET的基礎\r\n習題\r\n第2章 Dreamweaver CS3 的操作介面\r\n習題\r\n第3章 Visual Basic的基本語法\r\n習題\r\n第4章 ASP.NET的基本輸入／輸出、字串與日期\r\n習題\r\n第5章 ASP.NET的陣列、數學與檔案\r\n習題\r\n第6章 ASP.NET的伺服器控制項\r\n習題\r\n第 7章 網頁的文字、圖片與超連結\r\n習題\r\n第8章 網頁的表格、表單與頁框\r\n習題\r\n第9章 網頁的AP Div、影音、檔頭標籤與行為\r\n習題\r\n第10章 CSS樣式表\r\n習題\r\n第11章 ASP.NET的網頁處理\r\n習題\r\n第12章 ADO.NET資料庫系統\r\n習題\r\n第13章 Dreamweaver的資料庫處理\r\n習題\r\n第 14章 使用Spry建立AJAX頁面\r\n習題\r\n第15章 發佈網站\r\n習題\r\n第16章 會員管理系統\r\n第17 章 線上郵寄系統\r\n第18章 檔案的上傳與下載\r\n第19章 網路購物\r\n第20章 聊天室\r\n第21章 部落格\r\n附錄A 下載Dreamweaver CS3 試用版\r\n附錄B Dreamweaver CS3 的擴充功能\r\n附錄C 習題解答', '從本書您可以學到：\r\n\r\n* Visual Basic的基本語法\r\n* ASP.NET的基本語法\r\n* Dreamweaver CS3的介面用法\r\n* 如何使用ASP.NET來設計網頁\r\n* 如何使用Dreamweaver CS3來編輯網頁\r\n* 如何存取Access與SQL Server資料庫\r\n* 如何在Dreamweaver CS3中使用ASP.NET與Access來建立網頁資料庫\r\n* 如何應用Dreamweaver CS3的Spry架構，來建立具有AJAX功能的網頁\r\n* 如何設計CSS樣式\r\n* 如何建構自己的網站\r\n* 提供『會員管理系統』，『線上郵寄系統』，『檔案的上傳與下載』，『網路購物』，『聊天室』，以及『部落格』的實例應用', 1, '2008-01-01', 600, 85, 510, 'W8035', 'W8035.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (13, 'PHP網頁大作戰：如何防止駭客入侵您的網頁', '德瑞工作室', NULL, '第一章 PHP網頁的安全性\r\n第二章 Command Injection –命令植入攻擊\r\n第三章 Script Insertion –用戶端指令碼植入攻擊 \r\n第四章 XSS –跨網站指令碼攻擊 \r\n第五章 SQL Injection –SQL植入攻擊 \r\n第六章 CSRF – 跨網站請求偽造攻擊\r\n第七章 Session Hijacking–Session挟持攻擊 \r\n第八章 HTTP Response Splitting–HTTP回應分割攻擊 \r\n第九章 File Upload Attack–檔案上傳攻擊\r\n第十章 目錄/檔案攻擊\r\n第十一章 其他的攻擊 \r\n第十二章   攻擊手法總整理\r\n第十三章   漏洞掃描器\r\n第十四章   開發安全的Web用程式\r\n附錄A    Telnet使用說明\r\n附錄B    觀察HTTP請求與回應的實際內容\r\n附錄C    URL編碼與解碼\r\n附錄D    建構PHP的測試環境       \r\n附錄E    找出網站的IP位址', '本書詳盡解說駭客攻擊PHP應用程式的各種技術，當然更有破解與防禦方法的說明。要想建立安全的Web應用程式與網頁，不是光精通PHP程式寫作就能做到的。了解駭客實際的攻擊手法，才能知道如何來防禦。\r\n本書精選各種駭客的攻擊技術，總共有18種之多，大致能夠概括目前PHP網頁所遇到的攻擊手法。要想建立能夠讓客戶與上司信任的網頁，您一定要閱讀本書。', 1, '2007-08-01', 420, 85, 357, 'W7035', 'W7035.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (12, 'Dreamweaver &amp; ASP.NET網頁資料庫實務應用', '德瑞工作室', NULL, '第1章 Dreamweaver與ASP.NET的基礎 \r\n第2章 Visual Basic的基本語法 \r\n第3章 ASP.NET的基本物件 \r\n第4章 ASP.NET的字串與日期的處理\r\n第5章 ASP.NET的陣列與數學的處理 \r\n第6章 ASP.NET的檔案的處理 \r\n第7章 網頁的文字，圖片，與超連結\r\n第8章 網頁的表格，表單，與頁框 \r\n第9章 網頁的圖層，影音，行為，樣版，與CSS樣式表 \r\n第10章 ASP.NET的伺服器控制項 \r\n第11章 ASP.NET的網頁處理\r\n第12章 Dreamweaver的資料庫處理 \r\n第13章 ADO.NET資料庫系統 \r\n第14章 ASP.NET的資料庫控制項 \r\n第15章 發佈網站 \r\n第16章 會員管理系統 \r\n第17章 留言版 \r\n第18章 討論區 \r\n第19章 聊天室 \r\n第20章 檔案的上傳與下載\r\n第21章 網路購物 \r\n附錄a 下載Dreamweaver試用版', '* 如何使用Dreamweaver來編輯網頁\r\n* 如何使用Access與SQL Server資料庫\r\n* 如何在Dreamweaver中使用ASP.NET與Access和SQL Server來建立網頁資料庫\r\n* 如何建構自己的網站l 提供『會員管理系統』，『留言版』，『討論區』，『聊天室』，『檔案的上傳與下載』，以及『網路購物』的實例應用', 1, '2007-02-01', 620, 85, 527, 'W7015', 'W7015.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (11, 'Dreamweaver &amp; PHP網頁資料庫實務應用', '德瑞工作室', NULL, '基礎篇\r\n第1章　Dreamweaver與PHP的基礎\r\n第2章　PHP的基本語法\r\n第3章　PHP的運算子與流程控制\r\n第4章　PHP的陣列與字串\r\n第5章　PHP的函數\r\n第6章　PHP的日期，檔案，與數學函數\r\n第7章　PHP的類別，物件，與錯誤處理\r\n網頁設計篇\r\n第8章　網頁的文字，圖片，與超連結\r\n第9章　網頁的表格，表單與頁框\r\n第10章　網頁的圖層、影音、行為、樣版與CSS樣式表\r\n第11章　PHP的網頁處理 \r\n資料庫篇\r\n第12章　MySQL資料庫系統\r\n第13章　SQL的語法\r\n第14章　MySQL資料庫的建立與管理\r\n第15章　發佈網站\r\n實例應用篇\r\n第16章　會員管理系統\r\n第17章　留言版\r\n第18章　討論區\r\n第19章　聊天室\r\n第20章　檔案的上傳與下載\r\n第21章　網路購物\r\n附錄A 下載Dreamweaver試用版', '從本書您可以學到：\r\n* PHP的基本語法\r\n* Dreamweaver的介面用法\r\n* 如何使用PHP來設計網頁\r\n* 如何使用Dreamweaver來編輯網頁\r\n* 如何使用MySQL資料庫\r\n* 如何在Dreamweaver中使用PHP與MySQL來建立網頁資料庫\r\n* 如何建構自己的網站\r\n* 提供『會員管理系統』，『留言版』，『討論區』，『聊天室』，『檔案的上傳', 1, '2006-11-01', 560, 85, 476, 'W6145', 'W6145.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (10, '網go 2006快速解決網頁設計300問', '德瑞工作室', NULL, '第1章  瀏覽器\r\n第2章  視窗\r\n第3章  文字排版\r\n第4章  圖片排版        \r\n第5章  表格        \r\n第6章  表單\r\n第7章  滑鼠，按鍵，與超連結\r\n第8章  頁框\r\n第9章  選單        \r\n第10章  動態網頁\r\n第11章  視覺效果', '從事網頁設計的您一定會遇到許多問題吧？為了找到問題的解答，您可能翻遍了坊間各種書籍，或者在網際網路上千搜萬尋，卻還是始終找不到解答。此時的您必定是身心俱疲，感到十分的無奈吧？　　本書替您整理了300個網頁設計上常會遇到的問題，當然也提供了詳盡的解答。除了基本的網頁知識外，更深入地探討各種應用的範疇。如果您只是個新手，本書絕對能讓您快速地增加功力。如果您已經有多年的經驗，本書更能讓您當做快速的參考來源。\r\n\r\n誰需要這本書 ?　　\r\n不管是初學者或是老手，本書都是絕佳的參考書籍。初學者閱讀本書可以馬上功力大增，老手可以把本書當作手邊隨查隨用的工具書。', 1, '2006-05-01', 499, 85, 424, 'W6095', 'W6095.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (9, 'HTML/JavaScript網頁程式設計-XML+CSS', '德瑞工作室', NULL, 'Part 1  HTML網站的基礎\r\n第一章 JavaScript，XML，HTML與網際網路\r\n第二章 HTML的基礎語法\r\n第三章 變化多端的文字效果\r\n第四章 插入圖片的應用\r\n第五章 表格的製作 \r\n第六章 影音多媒體的製作\r\n第七章 奇妙的視覺效果 \r\n第八章 分割網頁\r\n第九章 在網頁中建立互動式表單\r\n\r\nPart 2  JavaScript的應用\r\n第十章 在網頁中建立超連結\r\n第十一章 網頁動態效果\r\n第十二章 網頁表單的應用 \r\n第十三章 應用JavaScript的綜合範例\r\n\r\nPart 3  XML的應用\r\n第十四章 在網頁中存取XML檔案 \r\n第十五章 將XML轉換成HTML –使用XSLT \r\n第十六章 XML與資料庫 – 使用XQuery \r\n第十七章 XML與表單 – 使用XForms\r\n\r\nPart 4  其它網頁技術\r\n第十八章 CSS排版樣本 \r\n第十九章 動態網頁技術 - ASP \r\n第二十章 使用ASP存取XML與資料庫 \r\n第二十一章 動態網頁技術 - PHP \r\n第二十二章 使用PHP存取XML與資料庫 \r\n第二十三章 動態網頁技術 - JSP \r\n\r\n附錄1  參考資料\r\n附錄2  特殊字元代碼對照表\r\n附錄3  顏色對照表\r\n附錄4  MIME檔案類型\r\n附錄5  JavaScript的保留字\r\n附錄6  JavaScript物件參考列表', '優秀的網頁設計不僅只是畫面好看而已，更重要的是網頁內部的結構能夠處理使用者的需求。提供動態的文字與影像，功能齊全的輸入表格，快速搜尋與顯示，以及更方便人性化的使用者介面，這些JavaScript程式都能夠做到。　　本書涵蓋了基礎的HTML，JavaScript，與XML的語法說明與眾多實例的應用。在網頁中開啟新視窗，顯示檔案，建立表格，以及樣板格式的設定，這些只是本書的基本內容而已。另外本書還包含了伺服端的程式設計，資料庫的存取，XML檔案的處理，功能表與工具列的建立等應用。\r\n\r\n[本書特色]\r\n從本書您可以學到什麼?\r\n*HTML的基礎知識\r\n*如何使用JavaScript設計HTML的程式\r\n*JavaScript的實際應用範例\r\n*XML的實際應用範例\r\n*各種網頁的應用語言，如CSS，ASP，PHP，與JSP等的實際應用範例\r\n*用戶端與伺服端的程式設計\r\n*上百個實際範例，讓您快速入手\r\n\r\n誰需要這本書?　　\r\n這本書包含了JavaScript的基礎到實際應用。即使您剛開始學習JavaScript，也能夠在短時間內瞭解其訣竅。如果您已經有使用JavaScript的經驗，那麼本書更能夠幫助您實用JavaScript的技術。', 1, '2006-01-01', 660, 85, 561, 'W6015', 'W6015.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (8, 'Microsoft Windows程式設計-使用C#', 'Charles Petzold', '德瑞工作室', '本書對Windows Forms 的專業開發人員提供了專家級的參考。 Windows作業系統程式語言的暢銷書作家 Charles Petzold 將教您如何運用Microsoft Visual C#-目前在Microsoft .NET作業平台下最先進的物件導向程式語言-在獨立式或分散式應用程式下製作動態使用者介面及圖形輸出利用各式範例與附贈可使用程式碼的CD光碟使讀者更加熟悉。', '得到您所需的專家指導來使用Microsoft .NET與Windows Forms的全部功能\r\r\n\r\n「看Petzold的」是發展Windows程式的流行語。在這本Microsoft Windows程式設計的指引中，暢銷作家教您如何挖出Windows Forms – 下一代Windows程式設計的類別函式庫的秘密。您會發現如何使用C#來建立Windows應用程式的動態使用者介面與圖形輸出。使用數十個以C#寫成的客戶端應用程式的範例來繪出常用的技術以及許多最佳程式實作的建議，您會立刻成為C#的高手。\r\n\r\n關於作者：\r\nCharles Petzold從1985年的春天得到一個beta Windows 1.0 SDK就開始設計Windows的程式。他在1986年12月寫了第一篇關於Windows程式設計的雜誌文章並且是Programming Windows的作者，這是有史以來的最暢銷程式設計書籍之一，以及Code：The Hidden Language of Computer Hardware and Software。他是唯一七個人之中的一個 – 而且是唯一的作者 – 從Windows magazine得到Windows Pioneer Award的。', 1, '2003-11-01', 880, 85, 748, 'EP207', 'EP207.jpg', '微軟圖書', 0, '電腦圖書', '程式語言');
INSERT INTO `computer_books` VALUES (7, 'Windows程式設計-使用Visual Basic .NET', 'Charles Petzold', '德瑞工作室', 'Petzold的暢銷C#書 – 現在給任何要用Microsoft Visual Basic .NET來發展的人\r\n\r\nCharles Petzold，世界級的領先Windows發展專家之一，已經將他的暢銷書Programming Microsoft Windows with C#，修改來給Visual Basic .NET的發展者使用! 暢銷作家教您如何使用Visual Basic .NET來挖出Windows Forms – 下一代Windows程式設計類別函式庫的秘密。您會學到如何使用Visual Basic的.NET致能版本，來建立Windows應用程式的動態使用者介面與圖形輸出。使用數十個客戶端應用程式的範例來繪出常用的技術，以及許多最佳程式實作的建議，您會立刻成為Visual Basic .NET的高手。', '在這個指引中所包含的主題：\r\n\r\n*Visual Basic .NET的導覽Bezier與其它曲線    \r\n*功能表\r\r\n*路徑,區域,與剪割                      \r\n*對話方塊\r\n*畫刷與畫筆\r\n*編輯,列示,與旋轉控制項\r\n*字型的樂趣\r\n*工具列與狀態列\r\n*列印\r\n*樹狀展示窗與列示展示窗\r\n*Metafile\r\n*剪貼,拖拉,與放下\r\n*嗨，Windows Forms\r\n*重要的結構\r\n*文字輸出的練習\r\n*直線,曲線,與區域填滿\r\n*輕敲鍵盤\r\n*頁與轉換式\r\n*馴服滑鼠\r\n*文字與字型\r\n*影像與點陣圖', 1, '2003-10-01', 880, 85, 748, 'EP229', 'EP229.jpg', '微軟圖書', 0, '電腦圖書', '程式語言');
INSERT INTO `computer_books` VALUES (6, 'Microsoft SQL Server 2000程式設計-使用Visual Basi.NET', 'Rick Dobson', '德瑞工作室', 'Part I	Visual Basic .NET與SQL Server 2000的基礎\r\n\r\n1	開始使用Visual Basic .NET來寫SQL Server 2000\r\n\r\nPart II	SQL Server 2000的資料存取，資料操作，與資料\r\n\r\n2	資料表與資料型態\r\n3	用T-SQL來設計資料存取的程式\r\n4	檢視與預存程序的程式設計\r\n5	使用者定義函式與觸發器的程式設計\r\n6	SQL Server 2000的XML功能\r\n7	SQL Server 2000的安全性\r\n\r\nPart III	使用Visual Basic .NET與SQL Server 2000的相關技術\r\n\r\n8	.NET Framework的總論\r\n9	建立Windows應用程式\r\n10	用ADO.NET來設計Windows解答的程式\r\n11	ASP.NET解答的程式設計\r\n12	用Visual Basic .NET來管理XML\r\n13	用XML Web服務常式來建立解答', '學習如何用SQL Server 2000，Visual Basic .NET，與XML來將資料轉換成解答\r\n使用這本程式員必備的導引書籍，來找到將資料轉換成有效的企業解答的最快速方式。您會學到用T-SQL來做資料存取，資料操作，與資料定義的SQL Server程式設計技術。您還會學到如何讓Visual Basic .NET，Microsoft Visual StudioR .NET整合發展環境的最先進程式語言，以及.NET Framework的高等技術，包括ADO.NET，ASP.NET，與XML Web服務常式，發揮最大的語言特性。您會得到SQL Server資料庫安全管理，SQL Server Web版本，以及ADO.NET與XML之間互動特性的深入了解。如果您在尋找專家的觀點來用SQL Server 2000與Visual \r\nBasic .NET來建立功能強大，安全的解答，那麼這就是您要的書。 本書所涵蓋的主題：\r\n- XML Web服務常式\r\n-SQL Server 2000的XML功能\r\n-XML的資料處理技術\r\n- 類別，事件，與錯誤處理的革新\r\n-資料表與資料型態\r\n-用T-SQL來設計資料存取的程式\r\n- 設計檢視與預存程序的程式\r\n- 設計使用者定義函式與觸發器的程式\r\n-SQL Server 2000的安全性\r\n-用SQL Server 2000與Visual Basic .NET來建立Microsoft WindowsR 應用程式\r\n-用ADO.NET來設計Windows解答的程式\r\n-設計ASP.NET解答的程式', 1, '2003-10-01', 680, 85, 578, 'EP304', 'EP304.jpg', '微軟圖書', 0, '電腦圖書', '程式語言');
INSERT INTO `computer_books` VALUES (1, '精通OFFICE 2000 VBA', '德瑞工作室', NULL, '第一章VBA入門\r\n第二章Visual Basic編輯器\r\n第三章 VBA語法\r\n第四章 物件與Automation\r\n第五章 撰寫Word巨集\r\n第六章撰寫Excel巨集\r\n第七章撰寫PowerPoint巨集\r\n第八章Access物件\r\n第九章撰寫Outlook巨集\r\n第十章撰寫FrontPage巨集\r\n第十一章 表單，功能表，與工具列\r\n第十二章 VBA在資料庫的運用\r\n第十三章 VBA在Internet的運用', 'VBA的基礎與進階應用介紹 、VBA的基礎語法介紹、詳細介紹Office 2000所有物件的構成元件、並列出Office 2000物件的屬性、方法、，及其事件的詳細資料並以實際的程式範例解說，帶領您快速進入Office 2000的程式設計領域。本書同時介紹VBA在資料庫及網際網路方面方面的實際應用。', 1, '2000-11-01', 520, 95, 519, 'A0243', 'A0243.jpg', '文魁圖書', 0, '電腦圖書', '程式語言');
INSERT INTO `computer_books` VALUES (2, '精通XHTML', '德瑞工作室', NULL, '第一章	XHTML簡介\r\n第二章	文字的編排控制\r\n第三章	影像的編排控制\r\n第四章	表格的編排控制\r\n第五章	超連結的編排控制\r\n第六章	CSS排版樣本\r\n第七章	框架的編排控制\r\n第八章	多媒體的編排控制\r\n第九章	XML的基礎\r\n第十章	JavaScript語言\r\n第十一章  JavaScript的物件\r\n第十二章  表單與控制項\r\n第十三章  動態XHTML\r\n第十四章  資料的處理\r\n附錄A  XHTML參考資料\r\n附錄B  特殊字元代碼對照表\r\n附錄C  顏色對照表\r\n附錄D  MIME檔案類型\r\n附錄E  XHTML標籤索引', '涵蓋HTML與XHTML，如果您尚未學過HTML，從本書也可以直接從基礎學起。\r\nXHTML技術的完整介紹。\r\nCSS排版樣本的撰寫方法。\r\nXHTML與XML的結合應用。\r\n大量的範例程式，讓您在學習上更容易上手。\r\n詳盡介紹XHTML的相關資源', 1, '2001-02-01', 680, 85, 578, 'W1045', 'W1045.jpg', '文魁圖書', 1, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (3, 'JAVASCRIPT &amp; XHTML網頁設計', '德瑞工作室', NULL, '第一章	JavaScript與XHTML\r\n第二章	基礎語法\r\n第三章	客戶端物件\r\n第四章	核心物件\r\n第五章	自訂物件\r\n第六章	伺服端JavaScript\r\n第七章	事件的處理\r\n第八章	Window物件\r\n第九章	Document物件\r\n第十章	Form物件\r\n第十一章	Frame物件\r\n第十二章	其它重要物件\r\n第十三章	文件物件模組', '本書特色\r\n	完整的JavaScript基本語法介紹\r\n	完整的JavaScript物件介紹\r\n	動態XHTML網頁的實際應用\r\n	涵蓋伺服端/客戶端JavaScript的程式設計\r\n	大量的範例讓您快速地了解實際的應用\r\n	涵蓋DOM與CSS的介紹\r\n	各類型的JavaScript應用實作\r\n	列出所有JavaScript版本的演進歷史\r\n	JavaScript與JScript的比較\r\n	學習使用偵錯工具\r\n	介紹如何在網頁中製作功能表與工具列', 1, '2001-05-01', 690, 85, 545, 'W1155', 'W1155.jpg', '文魁圖書', 0, '電腦圖書', '網頁設計');
INSERT INTO `computer_books` VALUES (4, '精通Python', '德瑞工作室', NULL, 'Python不但可以撰寫獨立的應用程式，而且也可以當作網頁中的script語言，此外，使用Python所寫的程式，不但可以跨平台使用而不須更改任何一行程式碼，且同時支援各種應用，例如資料庫以及Internet程式設計等，幾乎可以說在任何的作業系統上，您想要寫的任何應用程式，都可以使用Python來完成。', '涵蓋Python電腦語言的所有基礎與應用。\r\n使用最新版的Python 2.1。', 1, '2001-08-01', 680, 85, 578, 'W1265', 'W1265.jpg', '文魁圖書', 0, '電腦圖書', '程式語言');
INSERT INTO `computer_books` VALUES (5, '精通Perl', '德瑞工作室', NULL, '第一章	Perl簡介\r\n第二章	純量變數與串列\r\n第三章	陣列與雜湊\r\n第四章	運算子\r\n第五章	陳述式與控制結構\r\n第六章	副程式\r\n第七章	參考指標\r\n第八章	資料的處理\r\n第九章	格式化的輸出\r\n第十章	常規表示式\r\n第十一章	  預先定義的變數\r\n第十二章	  系統與時間資訊\r\n第十三章	  檔案的處理\r\n第十四章	  行程間的通訊\r\n第十五章	  類別庫與模組\r\n第十六章	  物件與類別\r\n第十七章	  標準模組\r\n第十八章	  使用Pragma控制執行\r\n第十九章	  除錯\r\n第二十章	  圖形模式的處理\r\n第二十一章	資料庫系統\r\n第二十二章	Internet與Socket \r\n第二十三章	CGI程式設計\r\n第二十四章	CGI應用實例\r\n第二十五章	嵌入與延伸Perl \r\n附錄A  Perl參考資料', '本書特色\r\n	完整的Perl基本語法介紹\r\n	Perl與HTML網頁的整合，在網頁內直接使用Perl程式碼\r\n	建立Internet應用程式，例如FTP，Telnet，電子郵件，以及新聞群組等\r\n	存取關聯式資料庫，例如ODBC\r\n	大量的範例讓您快速地了解實際的應用\r\n	各類型的Perl應用實作，例如訪客留言板，計數器，聊天室，電子郵件自動傳送，以及線上購物等\r\n	除錯工具的使用\r\n	在C程式內嵌入Perl程式碼\r\n	使用C程式來撰寫Perl延伸模組\r\n	使用物件導向程式設計\r\n使用Tk建立跨平台的GUI應用程式', 1, '2001-11-01', 680, 85, 578, 'W1323', 'W1323.jpg', '文魁圖書', 0, '電腦圖書', '程式語言');

-- --------------------------------------------------------

-- 
-- 資料表格式： `education_software`
-- 

CREATE TABLE `education_software` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(256) collate utf8_unicode_ci NOT NULL,
  `author` varchar(256) collate utf8_unicode_ci default NULL,
  `translator` varchar(256) collate utf8_unicode_ci default NULL,
  `contents` text collate utf8_unicode_ci,
  `feature` text collate utf8_unicode_ci,
  `cd` tinyint(4) default '0',
  `publishdate` date NOT NULL,
  `price` smallint(6) default '0',
  `discount` tinyint(4) default '100',
  `saleprice` smallint(6) default '0',
  `item_index` varchar(12) collate utf8_unicode_ci NOT NULL,
  `photo` varchar(256) collate utf8_unicode_ci default NULL,
  `publisher` varchar(64) collate utf8_unicode_ci default NULL,
  `color` tinyint(4) default '0',
  `category` varchar(20) collate utf8_unicode_ci default NULL,
  `category_type` varchar(20) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

-- 
-- 列出以下資料庫的數據： `education_software`
-- 

INSERT INTO `education_software` VALUES (1, '會聲會影10完整版', '友立', NULL, '最簡單好用的DV、HDV影片剪輯軟體', '*HDV、HDD支援：輕鬆擷取剪輯、輕打造王者畫質 \r\n*七軌影片覆疊：多重子母畫面、剪輯特效最華麗 \r\n*MPEG-4剪輯：PSP、i-POD、精彩影片帶著走 \r\n*智慧防手震：智慧回饋補償、珍貴畫面不錯過 \r\n*動畫過場選單：DVD美型選單、酷炫有型最厲害 \r\n*Dolby® Digital 5.1：家庭影片新指標、環繞音效新享受', 1, '2006-08-01', 3200, 92, 2950, '1006000002', '100600000293.jpg', '文魁圖書', 0, '教育軟體', '影像多媒體');
INSERT INTO `education_software` VALUES (2, 'Crazy Talk 4.0 中文版', '甲尚', NULL, '靜態相片進化大革命！相片主角擬真動起來！「CrazyTalk4」全新中文版提供革命性的獨家專利技術，只要輕鬆五步驟，就能讓靜態照片立刻變影片。不管是拍好的照片或是寵物、卡通以及歷史人物圖片通通都能活起來，輕鬆開口說話、唱歌教學，還可搭配劇情需求，即時匯入各種動態配件與臉部表情特效。是數位相機玩家入門 DV影片剪輯的必備工具，也提供數位影音玩家更多獨一無二的豐富影片素材。\r\n\r\n*最快速的相片變身影片功能\r\n 輕鬆五步驟 \r\n 直覺化時間軸編輯介面 \r\n 人臉自動辨識\r\n*最強大的相片開口說話技術\r\n 人臉網紋編輯套用 \r\n 肌肉控制技術 給相片最生動的表情 \r\n 唇型同步分析 (Lip-Sync) \r\n 雙音軌輸入：真人錄音、背景音樂匯入\r\n*最豪華的配件素材、動漫特效 \r\n 生活表情全記錄 \r\n 相片開口不失真 \r\n 隨意佩帶酷炫配件 \r\n 魔浮變聲功能 \r\n*最實用的影片輸出、網路分享\r\n 提昇支援DVD品質輸出 \r\n 多重影片格式分享 \r\n 支援手機.3GP格式輸出', '配備需求 :\r\n\r\n硬體需求\r\n中央處理器: Pentium III 500 MHz (建議Pentium III 800 MHz 或更高) \r\n記憶體：128 MB RAM (建議256 MB 或更多) \r\n安裝硬碟空間: 300 MB 剩餘空間(建議500 MB 或更多) \r\n音效卡/顯示卡/鍵盤/滑鼠/喇叭或耳機/麥克風 \r\n\r\n軟體需求\r\n作業系統：Microsoft Windows XP/ME/2000/98SE \r\n如欲輸出 WMV，您必須安裝 DirectX 9.0 與 WMEncoder 9 以上版本 \r\nInternet Explorer 5 或以上 \r\n網際網路連線設備', 1, '2005-09-01', 1490, 91, 1350, '1006000002', '100600000274.jpg', '文魁圖書', 0, '教育軟體', '影像多媒體');
INSERT INTO `education_software` VALUES (3, 'Visio 2007中文專業版', '微軟', NULL, '就 IT 和商業專業從業人員而言，Office Visio 2007 使得視覺化、分析、和溝通複雜資訊、系統和流程變得更為容易。使用具專業形象的 Visio 圖表，可讓您更了解系統和流程、對複雜的資訊更有概念並利用這些知識做出更佳的決策。\r\n\r\nOffice Visio 2007 有兩種獨立版本可供使用：Office Visio Professional 2007 及 Office Visio Standard 2007，後者具有和 Office Visio Professional 相同的基本功能，只不過是沒有包含全部的功能與範本。\r\n\r\n輕鬆地將程序、系統及資訊視覺化\r\n藉由使用 Office Visio 2007 中各式各樣的圖表 (例如：商業程序流程圖、網路圖表、工作流程圖、資料庫模型，以及軟體圖表等)，您可以利用視覺化的方式來記載、設計及充分瞭解商業程序與系統的狀態。此外，還可以利用 Office Visio Professional 2007 連接圖表與基礎資料，來提供更完整的資訊，讓這些圖表更聰明、更有用。\r\n\r\n分析複雜的資訊以快速取得深入瞭解\r\n經由使用 Office Visio Professional 2007，您可以利用視覺化的方式來展現複雜的資訊，以便看出主要趨勢、例外狀況和實際狀況。甚至進一步使用 Office Visio 2007 來分析、向下切入，及建立商業資料的多個檢視面，以獲得更深入的瞭解。使用內含豐富圖示和旗標的圖庫，可讓您輕鬆地識別主要問題、追蹤趨勢，以及標示例外狀況。\r\n\r\n有效地溝通資訊以獲得更佳的決策\r\n經由使用 Office Visio 2007，您可以運用圖表來加深聽眾的印象，這是只使用文字和數字無法達到的效果。甚至，也可以將外觀專業的 Office Visio 2007 圖表分享給即使是沒有安裝 Visio 的任何人。\r\n\r\n以程式設計方式自訂及擴充 Office Visio 2007\r\n程式化地擴充 Office Visio 2007 或透過與其他應用程式的整合，以迎合特定產業的情境或獨特的組織需求。研發部署您自己的，或是來自 Visio 解決方案提供者的各種自訂解決方案與圖形。', '1. 使用視覺化的方式記錄和設計您的系統和程序。 \r\n2. 以圖表整合不同來源的資訊，提高生產力。\r\n3. 使用 Office Visio 2007 更新圖表，減少手動重新輸入資料的次數。\r\n4. 以圖表顯示資料，進行資訊分析並獲得獨到的見解。\r\n5. 使用樞紐分析圖輕鬆追蹤趨勢、發現問題並以旗標標示例外狀況。\r\n6. 提升追蹤及報告專案資訊的效率。\r\n7. 使用新的範本和圖形溝通複雜的資訊。\r\n8. 以專業外觀的圖表吸引觀眾。\r\n9. 和需要圖表來幫助進行決策的人共用圖表。\r\n10. 以程式設計的方式自訂 Office Visio 2007，滿足您的特殊需求。', 1, '2007-07-01', 20190, 100, 20190, '1002000001', '100200000137.jpg', '微軟圖書', 0, '教育軟體', '電腦繪圖');
INSERT INTO `education_software` VALUES (4, 'Windows XP Professional 中文教育升級版(SP2)', '微軟', NULL, '商務與家庭的最佳選擇\r\nMicrosoft 最新的Windows 作業系統 Windows XP，它的設計為商務及家庭兩種使用者提供了體驗最炫的數位世界的自由空間。 \r\n\r\nWindows XP 的發行之所以獨樹一格在於這是 Microsoft 首度以相同軟體架構為根基推出完整的 Windows 用戶端作業平台產品線。Windows XP 乃建構在 Windows 的引擎之上，這是與推動 Windows 2000 作業系統系列相同的架構的一種進化。\r\n\r\n擁有新的 Windows 引擎作為其根基，Windows XP 儼然成為有效且可靠電腦經驗的新指標。它提供了極佳的便利性，而且還保有 對於電腦使用者相當重要的品質：安全、效能和可靠。Windows XP 將提供如堅石般穩固的基底，來建造一個令人讚賞的全新電腦 經驗。在家中，Windows XP 將為家庭網路、數位照相、音樂和娛樂提供強大的支援。而在企業空間中，Windows XP 將在通訊、 機動性和支援方面提供新藍本。\r\n\r\n為了達到家庭和商務兩種使用者的需求，Microsoft 提供了兩種 Windows XP 版本：Windows XP Home Edition 及 Windows XP Professional。Windows XP Home Edition 是專門為家庭使用者所設計，而 Windows XP Professional，包含 Windows XP Home Edition 的所有功能再加上其他進階功能，則是為各種大小型企業和在家中需要更強電腦經驗的使用者而量身訂做的。\r\n\r\n使 Windows XP Professional 有別於 Windows XP Home Edition 的主要領域在於：\r\n\r\n商業網路 \r\n管理 \r\n安全性 \r\n企業部署工具和技術 \r\n多語系支援 \r\n行動電腦 \r\n授權和支援程式', '系統需求\r\n \r\n處理器需求：233MHz以上(建議為300MHz以上) \r\n記憶體需求：64MB以上(建議128MB以上) \r\n硬碟空間：1.5GB以上 \r\n顯示卡：800*600模式或以上 \r\n讀取媒介：CD-ROM或是DVD-ROM \r\n其他裝置：鍵盤與滑鼠', 1, '2002-01-01', 1790, 89, 1590, '1001000000', '100100000001.jpg', '文魁圖書', 0, '教育軟體', '電腦繪圖');
INSERT INTO `education_software` VALUES (5, '文鼎注音小博士2(102套字)', '文鼎科技', NULL, '● 總共102套注音體、漢語拼音、通用拼音及外字字型，採用Unicode編碼，完全符合Microsoft Windows 2000及Windows XP之字型編碼規格。  \r\n● 全國首創獨家提供--筆順小博士，國字、注音符號等字體筆順顯示功能，可以自動顯示國字、注音符號的字體筆順順序，顯示書寫方向；可以配合滑鼠、手寫板等，做書寫練習用途。 \r\n● 文鼎注音精靈，提供正音破音自動判斷功能，在Word 2000、Word XP及Word 2003中，可以整篇文章自動判斷不同破音。 \r\n● 提供不同注音體切換功能，在Word 2000、Word XP及Word 2003中，切換不同注音體時不必再選破音，可以自動切換不同注音體。 \r\n● 提供字型樣式預覽功能，在Word 2000、Word XP及Word 2003中，可直接點選預覽視窗上不同式樣的注音、拼音字型。 \r\n● 文鼎編號精靈，可以快速輸入個種不同式樣的帶點數字及編號。 \r\n● 同時提供注音、漢語拼音、通用拼音，學習中文不分國內外。 \r\n● 文鼎注音小博士2，每一套注音體字型都提供一種正音及五種破音。 \r\n● 特別提供虛線國字、虛線注音等全新字型，讓低年級兒童學習寫國字及注音，更正確及容易。 \r\n● 32套不同的通用、漢語拼音字型，4套簡體漢語拼音，4套單一通用、漢語拼音，8套漢語拼音空框及通用拼音空框字型，任意編排漢語拼音及通用拼音都容易。 \r\n● 注音小博士與大部分軟體搭配使用，都可以正常顯示及列印，不會發生注音符號不見的現象。 \r\n● 注音小博士與Adobe Acrobat完全相容，轉成PDF檔案完全正常，是印刷排版的最佳選擇。 \r\n● 筆順小博士及文鼎標楷虛線國字體提供小學1～3年級學生常用國字兩千字。', '● 提供字型安裝程式\r\n● 供文鼎筆順小博士、文鼎注音精靈2、文鼎編號精靈 \r\n● 總共102套注音體、漢語拼音、通用拼音及外字字型 \r\n● 12套 國字加注音 \r\n● 17套 國字、注音加框 \r\n● 16套 國字、注音加括號 \r\n● 3 套 虛線注音、國字 \r\n● 3 套單一注音 \r\n● 22 套通用拼音 \r\n● 26 套漢語拼音 \r\n● 3套外字及帶點數字', 1, '2005-11-01', 1480, 93, 1380, '1012000001', '101200000157.jpg', '文魁圖書', 0, '教育軟體', '工具軟體');
INSERT INTO `education_software` VALUES (6, 'Namo FlashCreator 中文教育版', 'Namo', NULL, '產品簡介\r\nNamo FlashCreator 是一款全能型的Flash動畫製作工具， 強大的功能讓您更快更容易的製作專業級Flash影片。它支援 Shape design ，Rich format  文字編輯，影片剪輯和按鈕的建立，補間動畫和引匯線運動動畫，遮罩，流聲音和事件聲音。除了使用該程式的向量圖繪圖工具外，您還可以匯入其他的向量圖格式，包括AI，SVG 和WMF/EMF 來使用。\r\nNamo FlashCreator 還提供了專業的ActiveScript編輯器，並結合輔助功能，如語法加亮、自動顯示成員清單、參數資訊和自動完成代碼輸入，來幫助您輕鬆的編寫ActiveScript。\r\nNamo FlashCreator 最強大的一個功能是運用智慧的運動動畫分析和完全的ActiveScript支援，來匯入*.SWF格式的文件。所有匯入的元素及ActiveScript可以被輕鬆的修改，還可以將影片再匯出爲SWF格式，保證原來影片的元素和功能毫無損失。\r\n爲了製作出更專業的動畫，Namo FlashCreator  自帶了80餘款各種樣式的生動的動畫特效。您只需輕click下滑鼠，更改幾個參數即可完成複雜的動畫作品。此外，還支援多位元組語言文字。', 'SJ  Namo繼Namo WebEditor後   另一震撼性的網頁動畫製作工具！\r\n\r\nNamo FlashCreator優點\r\n＊Light & Quick  您可以輕易而熟練地使用\r\n　與競爭產品比較其安裝空間只需 1/10；產生的檔案只有 1/4而已。\r\n＊Familiar Interface 您不須花時間重新學習\r\n　標準的方式以及類似的介面，不需要另外學習其功能即可馬上使用 。\r\n　可使用同樣的時間線，同樣的調色板\r\n＊Perfectly Compatible它支援與標準產品間的相容性\r\n　可完完全全的匯入最新*.swf格式的文件\r\n　即使沒有 *.fla檔案，也可把 *.swf的時間線完完全全匯入進來\r\n＊Inexpensive 大幅減少您的花費\r\n　超強功能vs. 超低價位的產品。\r\n\r\n\r\n～套用範本是信心建立的開始\r\n　想輕鬆、快速製作炫目特效的Flash動畫？ \r\n　內建80種Flash動畫特效，只要您具備滑鼠操作能力，\r\n　Namo FlashCreator可以讓您在三分鐘內做好一個令人稱羨的Flash\r\n　動畫作品\r\n\r\n～觀摩作品是學習最佳的途徑\r\n　想觀摩、學習您在其他網站上看到的專業Flash格式動畫？\r\n　超強的網頁擷取功能，只要您具備基礎的Flash軟體操作能力，\r\n　您可以在觀摩學習其他網站的作品中，迅速成為Flash動畫高手\r\n\r\n主要特性 \r\n＊專業的Flash影片製作工具 \r\n　Namo FlashCreator支援繪製和編輯器向量圖，支援多種文字格式，可以創建電影剪輯和按鈕符號，可以創建各種運動動畫，支援遮罩圖層，流聲音和事件聲音。\r\n\r\n＊可編輯SWF \r\n　Namo FlashCreator不僅是一款專業的Flash影片製作工具，還是一款Flash編輯工具。不僅可以匯入*.swf格式的文件， 還可以編輯匯入文件中的元素。更值得一提的是，除了有匯入swf影片功能，還可以編輯影片中的各種元素。您無需*.fla 格式的文件就可以修改並替換這些元素。 \r\n　Namo FlashCreator完全支援ActionScript，可直接編寫或者編輯匯入影片中的ActiveScript。\r\n\r\n＊匯出影片\r\n　完成對影片的修改後，可匯出*.SWF格式的文件。 \r\n\r\n＊在瀏覽器中捕捉影片\r\n　安裝Namo FlashCreator  後，在Internet Explorer工具欄上會自動添加一個Namo FlashCreator Catcher的捕捉工具圖示。當您瀏覽一個含有Flash的頁面，click這個圖示或者click滑鼠右鍵功能表選擇“Namo FlashCreator Catcher”即可獲得頁面中的Flash文件。\r\n\r\n＊專業的ActiveScript編輯器\r\n　Namo FlashCreator還提供了專業的ActiveScript編輯器，並結合輔助功能，如語法加亮，自動顯示成員列表，參數資訊和自動完成代碼輸入，來幫助您輕鬆的編寫ActiveScript。\r\n\r\n＊內建動畫特效\r\n　Namo FlashCreator  自帶了80餘款各種樣式的生動的動畫特效。您只需輕click下滑鼠，更改幾個參數即可完成複雜的動畫作品。', 1, '2004-12-01', 1990, 85, 1690, '1005000001', '100500000162.jpg', '文魁圖書', 0, '教育軟體', '工具軟體');

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) collate utf8_unicode_ci NOT NULL,
  `password` varchar(12) collate utf8_unicode_ci NOT NULL,
  `name` varchar(40) collate utf8_unicode_ci NOT NULL,
  `sex` char(2) collate utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(40) collate utf8_unicode_ci NOT NULL,
  `phone` varchar(15) collate utf8_unicode_ci NOT NULL,
  `address` varchar(120) collate utf8_unicode_ci NOT NULL,
  `uniform` varchar(20) collate utf8_unicode_ci default NULL,
  `unititle` varchar(40) collate utf8_unicode_ci default NULL,
  `userlevel` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES (1, 'daniel', '123456', '管理員', '男', '1999-01-01', 'daniel@derek.com', '02-11112222', '德瑞工作室', NULL, '管理員', 99);
INSERT INTO `member` VALUES (2, 'andy', 'a123456', '李大華', '男', '1997-03-07', 'andy@example.com', '02-12345678', '台北市忠孝東路100號', NULL, NULL, 0);
INSERT INTO `member` VALUES (3, 'bob', 'b123456', '陳小明', '男', '1997-02-01', 'bob@example.com', '02-23456789', '台北市信義路23號', NULL, NULL, 0);
INSERT INTO `member` VALUES (4, 'cindy', 'c123456', '劉小珍', '女', '1997-08-03', 'cindy@example.com', '02-34567890', '台北市仁愛路332號', NULL, NULL, 0);
INSERT INTO `member` VALUES (5, 'mary', 'm123456', '廖小敏', '女', '1997-10-21', 'mary@example.com', '02-45678901', '台北市和平路194號', NULL, NULL, 0);
INSERT INTO `member` VALUES (6, 'david', 'd123456', '吳大龍', '男', '1997-05-17', 'david@example.com', '02-56789012', '台北市萬華路90號', NULL, NULL, 0);
INSERT INTO `member` VALUES (7, 'jane', 'j123456', '辛小君', '女', '1997-06-22', 'jane@example.com', '02-67890123', '台北市辛亥路4號', NULL, NULL, 0);
INSERT INTO `member` VALUES (8, 'kim', 'k123456', '趙大志', '男', '1997-09-13', 'kim@example.com', '02-78901234', '台北市基隆路211號', NULL, NULL, 0);
INSERT INTO `member` VALUES (9, 'sam', 's123456', '賴大平', '男', '1997-04-30', 'sam@example.com', '02-89012345', '台北市松平路112號', NULL, NULL, 0);

-- --------------------------------------------------------

-- 
-- 資料表格式： `order_detail`
-- 

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) collate utf8_unicode_ci NOT NULL,
  `order_index` varchar(28) collate utf8_unicode_ci NOT NULL,
  `item_index` varchar(12) collate utf8_unicode_ci NOT NULL,
  `item_name` varchar(256) collate utf8_unicode_ci NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `single_price` smallint(6) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

-- 
-- 列出以下資料庫的數據： `order_detail`
-- 

INSERT INTO `order_detail` VALUES (3, 'daniel', 'DR-DANIEL-100617184355', 'W8035', 'Dreamweaver CS3 &amp;amp; ASP.NET網頁資料庫範例教學---AJAX+CSS', 3, 510, 1530);
INSERT INTO `order_detail` VALUES (2, 'daniel', 'DR-DANIEL-100617184355', 'W8045', 'Dreamweaver CS3 &amp;amp; PHP網頁資料庫範例教學---AJAX+CSS', 2, 510, 1020);
INSERT INTO `order_detail` VALUES (1, 'daniel', 'DR-DANIEL-100617184355', 'W8155', '網頁程式設計師--HTML、JavaScript、CSS、XHTML、AjAX', 1, 527, 527);
INSERT INTO `order_detail` VALUES (4, 'daniel', 'DR-DANIEL-100617184355', 'W7035', 'PHP網頁大作戰：如何防止駭客入侵您的網頁', 4, 357, 1428);

-- --------------------------------------------------------

-- 
-- 資料表格式： `order_list`
-- 

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(12) collate utf8_unicode_ci NOT NULL,
  `order_index` varchar(28) collate utf8_unicode_ci NOT NULL,
  `order_price` int(11) NOT NULL,
  `payment` varchar(10) collate utf8_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- 
-- 列出以下資料庫的數據： `order_list`
-- 

INSERT INTO `order_list` VALUES (1, 'daniel', 'DR-DANIEL-100617184355', 4605, '線上刷卡', '2010-06-17');
