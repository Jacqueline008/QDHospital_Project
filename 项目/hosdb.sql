-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-11-16 09:40:17
-- 服务器版本： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosdb`
--
create database `hosdb`;
use `hosdb`;
-- --------------------------------------------------------

--
-- 表的结构 `blacklist`
--

CREATE TABLE `blacklist` (
  `p_id` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `cant`
--

CREATE TABLE `cant` (
  `cant_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `cant_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `parent_code` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `cant`
--

INSERT INTO `cant` (`cant_code`, `cant_name`, `parent_code`) VALUES
('10001', '市南区', 'null'),
('100010', '莱西市', 'null'),
('10002', '市北区', 'null'),
('10003', '黄岛区', 'null'),
('10004', '崂山区', 'null'),
('10005', '李沧区', 'null'),
('10006', '城阳区', 'null'),
('10007', '胶州市', 'null'),
('10008', '即墨市', 'null'),
('10009', '平度市', 'null');

-- --------------------------------------------------------

--
-- 表的结构 `department`
--

CREATE TABLE `department` (
  `hos_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dic_item` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dic_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `department`
--

INSERT INTO `department` (`hos_code`, `dep_code`, `dep_name`, `dic_item`, `dic_code`, `dep_description`) VALUES
('QH001', '1NK001', '消化内科', 'DEP_CATEGORY', '1NK', '消化专业组始于1960年，现为“青岛市重点学科”，是硕士、博士学位授权点，在“胃肠、肝胆胰疾病”微创诊治与研究、功能性及动力障碍性胃肠疾病的基础研究与临床诊治方面，特别是在糖尿病胃轻瘫及IBS研究方面处于省内领先水平。在重症胰腺炎的早期识别及胰腺癌的早期诊断方面达到国内先进水平，参加中华医学会消化病学会胰腺病学组“急性胰腺炎诊治指南”制定工作。承担国家、省自然基金课题6项、厅局级课题16项。承担医疗、护理、七年制、南亚留学生及博士、硕士研究生的教学任务。'),
('QH001', '1NK002', '神经内科', 'DEP_CATEGORY', '1NK', '神经内科是关于神经方面的二级学科。不属于内科概念。主要诊治脑血管疾病（脑梗塞、脑出血）、偏头痛、脑部炎症性疾病（脑炎、脑膜炎）、脊髓炎、癫痫、痴呆、代谢病和遗传病、三叉神经痛、坐骨神经病、周围神经病及重症肌无力等。主要检查手段包括头颈部MRI，CT，ECT，PETCT，脑电图，TCD（经颅多普勒超声），肌电图，诱发电位及血流变学检查等。同时与心理科交叉进行神经衰弱、失眠等功能性疾患的诊治。'),
('QH001', '1NK003', '呼吸内科', 'DEP_CATEGORY', '1NK', '呼吸内科始建于20世纪50年代，1952年设立肺病门诊，1960年建立呼吸病专业组，1994年呼吸内科独立成为三级学科。目前承担国家自然科学基金课题2项和山东省自然科学基金课题1项，参与国家“十五”公关课题1项，承担卫生部教学研究课题2项，承担山东省科技厅、卫生厅课题3项，承担青岛市科技局课题2项。科研经费总额约达100万元。近年来，在学术刊物发表论文30余篇，其中核心期刊20余篇；主编或参编著作7部。'),
('QH001', '1NK004', '内分泌科', 'DEP_CATEGORY', '1NK', '内分泌科始建于1977年 ，1981建立内分泌实验室，1997年青岛市首批卫生系统特色专业，1997临床药物试验基地内分泌专业点，1999年青岛大学重点实验室，2000年内分泌硕士学位授予点，2001年美国世界健康教育基金会（HOPE）全国糖尿病教员培训基地，2002年至今青岛卫生系统重点学科，连续7年医院“十佳科室” ，2009年科技厅重点实验室—痛风病实验室，2010年成立了痛风病临床医学中心，2011年青岛市甲状腺病重点实验室'),
('QH001', '1NK005', '肾内科', 'DEP_CATEGORY', '1NK', '急性肾小球肾炎、急进性肾小球肾炎、慢性肾小球肾炎、肾病综合征、IgA肾病、间质性肾炎、肾小管酸中毒、急性肾衰竭、慢性肾衰竭、膜性肾病、系统性红斑狼疮肾炎、高血压肾损害、糖尿病肾病等。\n'),
('QH001', '1NK006', '心血管内科', 'DEP_CATEGORY', '1NK', '心血管内科前身为内科心血管专业组。上世纪80年代独立建科以来，该科已发展成为山东省东部心血管内科的临床、教学、科研中心。该科为青岛市冠心病治疗特色专科，医院重点科室，硕士研究生授权点，拥有雄厚的人才和技术力量，在山东省尤其是半岛地区享有很高的声誉。是卫生部首批心血管疾病介入治疗培训基地（冠心病介入治疗培训基地和心律失常介入治疗培训基地）和青岛市高血压病重点实验室。病房环境幽雅，医疗设备先进'),
('QH001', '1WK001', '泌尿外科', 'DEP_CATEGORY', '2WK', '泌尿外科有着深厚悠久的学科发展历史，最早可追溯至1947年在医院外科系统建立泌尿外科专业组，历经冯雁忱、韩振藩、董俊友、蓝振斋、李冰清等老一代教授，至1988年独立建科，年门诊量5万余人次，年手术量3000余例，由本部泌尿外科病区、东区泌尿外科病区、西海岸泌尿外科病区、泌尿男科学研究室'),
('QH001', '2WK002', '胸外科', 'DEP_CATEGORY', '2WK', '胸外科是一门医学专科，专门研究胸腔内器官，主要指食道、肺部、纵隔病变的诊断及治疗，乳腺外科领域也被归入这个专科，其中又以肺外科和食道外科为主。胸外科是一个古老的学科，其形成和发展大经历了1个世纪，同时也由点滴的临床经验的积累，发展为具有独立的理论基础又与各个学科相互渗透独立体系。'),
('QH001', '2WK003', '神经外科', 'DEP_CATEGORY', '2WK', '神经外科（Neurosurgery）是外科学中的一个分支，是在外科学以手术为主要治疗手段的基础上，应用独特的神经外科学研究方法，研究人体神经系统，如脑、脊髓和周围神经系统，以及与之相关的附属机构，如颅骨、头皮、脑血管脑膜等结构的损伤、炎症、肿瘤、畸形和某些遗传代谢障碍或功能紊乱疾病，如：癫痫、帕金森病、神经痛等疾病的病因及发病机制，并探索新的诊断、治疗、预防技术的一门高、精、尖学科。'),
('QH001', '2WK004', '普通外科', 'DEP_CATEGORY', '2WK', '普外科(Department of general surgery)是以手术为主要方法治疗肝脏、胆道、胰腺、胃肠、肛肠、血管疾病、甲状腺和乳房的肿瘤及外伤等其它疾病的临床学科，是外科系统最大的专科。普外科即普通外科，一般综合性医院外科除普外科外还有骨科、神经外科、心胸外科、泌尿外科等。有的医院甚至将普外科更细的分为颈乳科、胃肠外科、肝胆胰脾外科等，还有肛肠科、烧伤整形科、血管外科、小儿外科、移植外科、营养科等都与普外科有关系。'),
('QH001', '2WK005', '心外科', 'DEP_CATEGORY', '2WK', ' 1979年建科，是山东东部地区最大的心外科临床、科研和教学中心，在冠心病、瓣膜病、大血管疾病和先心病的外科治疗均达国内先进水平，并且与多家国际著名心外科中心建立学术合作关系。 开展微创非体外循环冠脉搭桥术连续200例无死亡，无论手术的数量和质量均居省内领先，并且在国内有较大影响。瓣膜病外科治疗是青岛市特色学科，在瓣膜置换的同期行单、双极射频消融迷宫手术治疗风心病合并房颤是国内最早开展的单位之一'),
('QH001', '2WK006', '血管外科', 'DEP_CATEGORY', '2WK', '血管外科由成立于2000年。收治的病人来自山东半岛各地以及周边省市部分地区。自1992年至今已发表论文30余篇，获市科技进步奖2项，参编专著5部。成功举办了第二届山东省医学会血管外科年会。 科室全面开展了各种血管疾病的诊断和手术及介入治疗，在省内和青岛地区先后开展的新技术新项目达十余项，在先天性血管畸形、各种血管损伤、动脉瘤、动脉硬化闭塞、静脉血栓形成和下肢静脉曲张的诊治均积累了比较成熟的经验'),
('QH001', '3FY001', '妇科', 'DEP_CATEGORY', '3FY', '1979年成为我国首批硕士研究生授权点，2009年成为博士研究生授权点。目前已发展成了集科、教、研、医于一体的在国内有一定影响的科室。多次被医院评为“十佳科室”，2002年被评为“青岛市特色专科”，2007年荣获“全国巾帼文明岗”称号，2008年被评为“青岛市重点学科”。现有医师23名，其中博士7名，硕士12名，副高及以上职称10人'),
('QH001', '3FY002', '产科', 'DEP_CATEGORY', '3FY', '妇产科是临床医学四大主要学科之一，主要研究女性生殖器官疾病的病因、病理、诊断及防治，妊娠、分娩的生理和病理变化，高危妊娠及难产的预防和诊治，女性生殖内分泌，计划生育及妇女保健等。现代分子生物学、肿瘤学、遗传学、生殖内分泌学及免疫学等医学基础理论的深入研究和临床医学诊疗检测技术的进步，拓宽和深化了妇产科学的发展，为保障妇女身体和生殖健康及防治各种妇产科疾病起着重要的作用。妇产科学不仅与外科、内科、儿科学等临床学有密切联系，需要现代诊疗技术(内镜技术、影像学、放射介人等)、临床药理学、病理学胚胎学、解剖学、流行病学等多学科的基础知识，而且是一门具有自己特点并需有综合临床、基础知识的学科。'),
('QH001', '3FY003', '儿科', 'DEP_CATEGORY', '3FY', '儿科学研究从胎儿到青春期儿童有关促进生理及心理健康成长和疾病的防治。目前有儿童保健、新生儿学、呼吸、心血管、血液、肾脏、神经、内分泌与代谢、免疫感染与消化、急救以及小儿外科等专业。每个专业学科又和基础医学某些学科有密切联系，如生理、生化、病理、遗传以及分子生物学等。'),
('QH001', '3FY004', '小儿内科', 'DEP_CATEGORY', '3FY', '1900年德国建胶澳督署医院后即设小儿科， 至今已有百余年历史。在完成医疗工作的同时，还完成本科生、研究生和进修生的教学任务及多项国家和省市级科研课题并多次获奖。本科与儿科学相关科室一起，是山东省教育厅重点学科。1993年开始招收硕士研究生，2005年成为博士学位授权点，2007年开始招收博士研究生。是山东省东部儿童疑难危重病诊治中心，也是儿科学教学、科研的中心。'),
('QH001', '3FY005', '小儿外科', 'DEP_CATEGORY', '3FY', '青岛医学院曾拥有国内最早的儿科系，青岛大学附属医院的前身1900年德国初建胶澳督署医院即设小儿科，1958年组建小儿外科专业，由季海萍、黄婉芬医师负责，属普外组，设病床18张。1978年10月，小儿外科独立建科，由黄婉芬任主任，小儿外科作为儿科系重要的组成部分，为学科发展起到重要的作用'),
('QH001', '4ZY001', '中医科', 'DEP_CATEGORY', '4ZY', '中医科始建于1956年初，现已发展成为集医疗、教学与科研于一体的适应现代医院发展需要的综合科室。近年来，重点开展了中药治疗消化系统疾病，中药对肝炎后肝纤维化的防治、胆囊炎胆石症的综合治疗，在岛城较早开展了中药抗肝纤维化的研究，临床对慢性病毒性肝炎、酒精肝、脂肪肝、肝硬化并腹水的治疗效果显著，经国内专家组鉴定，整体疗效达国内领先水平。 随着西海岸医疗中心的正式营业，中医科将继续开展中西医结合肿瘤的防治'),
('QH001', '4ZY002', '中医肛肠科', 'DEP_CATEGORY', '4ZY', '肛肠专科一般汇聚国内外强大的科研实力和丰富的专家资源为依托，整合利用国际、国内肛肠疾病防治领域的最新科研成果和全国中医药行业的有效资源，在技术、学术、信息等方面居国际领先水平，是肛肠疾病防治的权威机构。'),
('QH002', '1NK001', '消化内科', 'DEP_CATEGORY', '1NK', '消化专业组始于1960年，现为“青岛市重点学科”，是硕士、博士学位授权点，在“胃肠、肝胆胰疾病”微创诊治与研究、功能性及动力障碍性胃肠疾病的基础研究与临床诊治方面，特别是在糖尿病胃轻瘫及IBS研究方面处于省内领先水平。在重症胰腺炎的早期识别及胰腺癌的早期诊断方面达到国内先进水平，参加中华医学会消化病学会胰腺病学组“急性胰腺炎诊治指南”制定工作。承担国家、省自然基金课题6项、厅局级课题16项。承担医疗、护理、七年制、南亚留学生及博士、硕士研究生的教学任务。'),
('QH002', '1NK002', '神经内科', 'DEP_CATEGORY', '1NK', '神经内科是关于神经方面的二级学科。不属于内科概念。主要诊治脑血管疾病（脑梗塞、脑出血）、偏头痛、脑部炎症性疾病（脑炎、脑膜炎）、脊髓炎、癫痫、痴呆、代谢病和遗传病、三叉神经痛、坐骨神经病、周围神经病及重症肌无力等。主要检查手段包括头颈部MRI，CT，ECT，PETCT，脑电图，TCD（经颅多普勒超声），肌电图，诱发电位及血流变学检查等。同时与心理科交叉进行神经衰弱、失眠等功能性疾患的诊治。'),
('QH002', '1NK003', '呼吸内科', 'DEP_CATEGORY', '1NK', '呼吸内科始建于20世纪50年代，1952年设立肺病门诊，1960年建立呼吸病专业组，1994年呼吸内科独立成为三级学科。目前承担国家自然科学基金课题2项和山东省自然科学基金课题1项，参与国家“十五”公关课题1项，承担卫生部教学研究课题2项，承担山东省科技厅、卫生厅课题3项，承担青岛市科技局课题2项。科研经费总额约达100万元。近年来，在学术刊物发表论文30余篇，其中核心期刊20余篇；主编或参编著作7部。'),
('QH002', '2WK001', '泌尿外科', 'DEP_CATEGORY', '2WK', '泌尿外科有着深厚悠久的学科发展历史，最早可追溯至1947年在医院外科系统建立泌尿外科专业组，历经冯雁忱、韩振藩、董俊友、蓝振斋、李冰清等老一代教授，至1988年独立建科，年门诊量5万余人次，年手术量3000余例，由本部泌尿外科病区、东区泌尿外科病区、西海岸泌尿外科病区、泌尿男科学研究室'),
('QH002', '2WK002', '胸外科', 'DEP_CATEGORY', '2WK', '胸外科是一门医学专科，专门研究胸腔内器官，主要指食道、肺部、纵隔病变的诊断及治疗，乳腺外科领域也被归入这个专科，其中又以肺外科和食道外科为主。胸外科是一个古老的学科，其形成和发展大经历了1个世纪，同时也由点滴的临床经验的积累，发展为具有独立的理论基础又与各个学科相互渗透独立体系。'),
('QH002', '2WK003', '神经外科', 'DEP_CATEGORY', '2WK', '神经外科（Neurosurgery）是外科学中的一个分支，是在外科学以手术为主要治疗手段的基础上，应用独特的神经外科学研究方法，研究人体神经系统，如脑、脊髓和周围神经系统，以及与之相关的附属机构，如颅骨、头皮、脑血管脑膜等结构的损伤、炎症、肿瘤、畸形和某些遗传代谢障碍或功能紊乱疾病，如：癫痫、帕金森病、神经痛等疾病的病因及发病机制，并探索新的诊断、治疗、预防技术的一门高、精、尖学科。'),
('QH002', '3FY001', '妇科', 'DEP_CATEGORY', '3FY', '1979年成为我国首批硕士研究生授权点，2009年成为博士研究生授权点。目前已发展成了集科、教、研、医于一体的在国内有一定影响的科室。多次被医院评为“十佳科室”，2002年被评为“青岛市特色专科”，2007年荣获“全国巾帼文明岗”称号，2008年被评为“青岛市重点学科”。现有医师23名，其中博士7名，硕士12名，副高及以上职称10人'),
('QH002', '3FY002', '产科', 'DEP_CATEGORY', '3FY', '妇产科是临床医学四大主要学科之一，主要研究女性生殖器官疾病的病因、病理、诊断及防治，妊娠、分娩的生理和病理变化，高危妊娠及难产的预防和诊治，女性生殖内分泌，计划生育及妇女保健等。现代分子生物学、肿瘤学、遗传学、生殖内分泌学及免疫学等医学基础理论的深入研究和临床医学诊疗检测技术的进步，拓宽和深化了妇产科学的发展，为保障妇女身体和生殖健康及防治各种妇产科疾病起着重要的作用。妇产科学不仅与外科、内科、儿科学等临床学有密切联系，需要现代诊疗技术(内镜技术、影像学、放射介人等)、临床药理学、病理学胚胎学、解剖学、流行病学等多学科的基础知识，而且是一门具有自己特点并需有综合临床、基础知识的学科。'),
('QH002', '3FY003', '儿科', 'DEP_CATEGORY', '3FY', '儿科学研究从胎儿到青春期儿童有关促进生理及心理健康成长和疾病的防治。目前有儿童保健、新生儿学、呼吸、心血管、血液、肾脏、神经、内分泌与代谢、免疫感染与消化、急救以及小儿外科等专业。每个专业学科又和基础医学某些学科有密切联系，如生理、生化、病理、遗传以及分子生物学等。'),
('QH002', '4ZY001', '中医科', 'DEP_CATEGORY', '4ZY', '中医科始建于1956年初，现已发展成为集医疗、教学与科研于一体的适应现代医院发展需要的综合科室。近年来，重点开展了中药治疗消化系统疾病，中药对肝炎后肝纤维化的防治、胆囊炎胆石症的综合治疗，在岛城较早开展了中药抗肝纤维化的研究，临床对慢性病毒性肝炎、酒精肝、脂肪肝、肝硬化并腹水的治疗效果显著，经国内专家组鉴定，整体疗效达国内领先水平。 随着西海岸医疗中心的正式营业，中医科将继续开展中西医结合肿瘤的防治');

-- --------------------------------------------------------

--
-- 表的结构 `dictionary`
--

CREATE TABLE `dictionary` (
  `dic_item` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dic_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `dictionary`
--

INSERT INTO `dictionary` (`dic_item`, `dic_name`) VALUES
('DEP_CATEGORY', '科室类别'),
('STOP_TIME', '禁用时长');

-- --------------------------------------------------------

--
-- 表的结构 `dictionary_item`
--

CREATE TABLE `dictionary_item` (
  `dic_item` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dic_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dic_value` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `dictionary_item`
--

INSERT INTO `dictionary_item` (`dic_item`, `dic_code`, `dic_value`) VALUES
('DEP_CATEGORY', '1NK', '内科'),
('DEP_CATEGORY', '2WK', '外科'),
('DEP_CATEGORY', '3FY', '妇幼'),
('DEP_CATEGORY', '4ZY', '中医'),
('STOP_TIME', '1', '3');

-- --------------------------------------------------------

--
-- 表的结构 `doctor`
--

CREATE TABLE `doctor` (
  `hos_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dep_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doc_code` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `doc_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doc_pwd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `doclevel_code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `doc_tel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `doc_sex` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT '/Hos/Public/images/default-doctor.png',
  `doc_age` int(11) DEFAULT NULL,
  `doc_area` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `doctor`
--

INSERT INTO `doctor` (`hos_code`, `dep_code`, `doc_code`, `doc_name`, `doc_pwd`, `doclevel_code`, `doc_tel`, `doc_sex`, `doc_pic`, `doc_age`, `doc_area`) VALUES
('QH001', '1NK001', 'QH001D001', '江月萍', '123', '4', '17898767865', 'F', '/Hos/Public/Uploads/5a08370c22014.JPG', 40, '消化系统常见病、疑难病和危重病的诊治，专业方向为胰腺疾病诊断与治疗。在消化内镜领域，擅长超声内镜及胃肠镜诊疗技术'),
('QH001', '1NK001', 'QH001D002', '张民生', '123', '4', '17899999987', 'M', '/Hos/Public/Uploads/5a083765ada61.JPG', 50, '擅长急慢性胃炎、消化性溃疡、各种急慢性肝病、胆囊疾病、胰腺炎、急慢性腹泻、溃疡性结肠炎、胃食管反流病等的诊断和治疗'),
('QH001', '1NK001', 'QH001D003', '魏良洲', '123', '4', '17865678765', 'M', '/Hos/Public/Uploads/5a0837b1ae4a2.jpg', 60, '肝硬化食管曲张静脉套扎，内镜下介入诊疗，内镜下胆总管结石取石治疗'),
('QH001', '1NK001', 'QH001D004', '张翠萍', '123', '4', '17898767653', 'F', '/Hos/Public/Uploads/5a0837f56a497.jpg', 55, '对消化系统疾病，尤其是萎缩性胃炎、溃疡病、胃食管反流病、慢性肝病、肝硬化、慢性腹泻、消化道癌前病变等疾病的诊治积累了丰富的临床经验'),
('QH001', '1NK001', 'QH001D005', '荆雪', '123', '3', '17876776899', 'F', '/Hos/Public/Uploads/5a0838350a0be.jpg', 30, '擅长消化系统各种疑难病症的诊治'),
('QH001', '1NK001', 'QH001D006', '刘华', '123', '3', '17866666666', 'F', '/Hos/Public/Uploads/5a08389fec7d5.jpg', 33, '慢性胃炎、胃食管反流病、功能性消化不良、慢性腹泻，肝胆系疾病'),
('QH002', '1NK001', 'QH002D001', '綦淑杰', '123', '4', '17878787896', 'F', '/Hos/Public/Uploads/5a0838fa2a859.jpg', 28, '胃肠肝胆疾病及消化内镜'),
('QH002', '1NK001', 'QH002D002', '赵翠梅', '123', '2', '17867878786', 'F', '/Hos/Public/Uploads/5a083942f18d6.jpg', 30, '十二指肠镜操作、ERCP及胆总管结石取石术、胆总管良恶性狭窄扩张及支架置入术、胃石症碎石术、消化道狭窄扩张及支架置入术、消化道异物取出术、消化道息肉切除术等'),
('QH002', '1NK001', 'QH002D003', '聂淼', '123', '3', '17878564322', 'F', '/Hos/Public/Uploads/5a08397da9f11.jpg', 28, '消化系统各种常见病、多发病、及疑难病的诊治');

--
-- 触发器 `doctor`
--
DELIMITER $$
CREATE TRIGGER `doctor_trigger` AFTER INSERT ON `doctor` FOR EACH ROW begin 
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,1,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,1,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,2,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,2,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,3,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,3,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,4,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,4,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,5,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,5,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,6,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,6,'下午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,0,'上午',0);
insert into duty_schedule(doc_code,week_code,time_range,dut_status) 
values(new.doc_code,0,'下午',0);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `doc_level`
--

CREATE TABLE `doc_level` (
  `doclevel_code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `doclevel_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `doc_level`
--

INSERT INTO `doc_level` (`doclevel_code`, `doclevel_name`) VALUES
('1', '住院医师'),
('2', '主治医师'),
('3', '副主任医师'),
('4', '主任医师');

-- --------------------------------------------------------

--
-- 表的结构 `duty_schedule`
--

CREATE TABLE `duty_schedule` (
  `dut_code` int(11) NOT NULL,
  `doc_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `week_code` int(11) NOT NULL,
  `time_range` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `dut_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `duty_schedule`
--

INSERT INTO `duty_schedule` (`dut_code`, `doc_code`, `week_code`, `time_range`, `dut_status`) VALUES
(1, 'QH001D001', 1, '上午', 1),
(2, 'QH001D001', 1, '下午', 1),
(3, 'QH001D001', 2, '上午', 0),
(4, 'QH001D001', 2, '下午', 0),
(5, 'QH001D001', 3, '上午', 1),
(6, 'QH001D001', 3, '下午', 1),
(7, 'QH001D001', 4, '上午', 1),
(8, 'QH001D001', 4, '下午', 1),
(9, 'QH001D001', 5, '上午', 1),
(10, 'QH001D001', 5, '下午', 1),
(11, 'QH001D001', 6, '上午', 0),
(12, 'QH001D001', 6, '下午', 0),
(13, 'QH001D001', 0, '上午', 1),
(14, 'QH001D001', 0, '下午', 1),
(15, 'QH001D002', 1, '上午', 0),
(16, 'QH001D002', 1, '下午', 0),
(17, 'QH001D002', 2, '上午', 1),
(18, 'QH001D002', 2, '下午', 1),
(19, 'QH001D002', 3, '上午', 0),
(20, 'QH001D002', 3, '下午', 0),
(21, 'QH001D002', 4, '上午', 1),
(22, 'QH001D002', 4, '下午', 1),
(23, 'QH001D002', 5, '上午', 0),
(24, 'QH001D002', 5, '下午', 0),
(25, 'QH001D002', 6, '上午', 1),
(26, 'QH001D002', 6, '下午', 1),
(27, 'QH001D002', 0, '上午', 0),
(28, 'QH001D002', 0, '下午', 0),
(29, 'QH001D003', 1, '上午', 1),
(30, 'QH001D003', 1, '下午', 1),
(31, 'QH001D003', 2, '上午', 0),
(32, 'QH001D003', 2, '下午', 0),
(33, 'QH001D003', 3, '上午', 1),
(34, 'QH001D003', 3, '下午', 1),
(35, 'QH001D003', 4, '上午', 0),
(36, 'QH001D003', 4, '下午', 0),
(37, 'QH001D003', 5, '上午', 1),
(38, 'QH001D003', 5, '下午', 1),
(39, 'QH001D003', 6, '上午', 0),
(40, 'QH001D003', 6, '下午', 0),
(41, 'QH001D003', 0, '上午', 1),
(42, 'QH001D003', 0, '下午', 1),
(43, 'QH001D004', 1, '上午', 0),
(44, 'QH001D004', 1, '下午', 0),
(45, 'QH001D004', 2, '上午', 1),
(46, 'QH001D004', 2, '下午', 1),
(47, 'QH001D004', 3, '上午', 0),
(48, 'QH001D004', 3, '下午', 0),
(49, 'QH001D004', 4, '上午', 1),
(50, 'QH001D004', 4, '下午', 1),
(51, 'QH001D004', 5, '上午', 0),
(52, 'QH001D004', 5, '下午', 0),
(53, 'QH001D004', 6, '上午', 1),
(54, 'QH001D004', 6, '下午', 1),
(55, 'QH001D004', 0, '上午', 0),
(56, 'QH001D004', 0, '下午', 0),
(57, 'QH001D005', 1, '上午', 1),
(58, 'QH001D005', 1, '下午', 1),
(59, 'QH001D005', 2, '上午', 0),
(60, 'QH001D005', 2, '下午', 0),
(61, 'QH001D005', 3, '上午', 1),
(62, 'QH001D005', 3, '下午', 1),
(63, 'QH001D005', 4, '上午', 0),
(64, 'QH001D005', 4, '下午', 0),
(65, 'QH001D005', 5, '上午', 1),
(66, 'QH001D005', 5, '下午', 1),
(67, 'QH001D005', 6, '上午', 0),
(68, 'QH001D005', 6, '下午', 0),
(69, 'QH001D005', 0, '上午', 1),
(70, 'QH001D005', 0, '下午', 1),
(71, 'QH001D006', 1, '上午', 0),
(72, 'QH001D006', 1, '下午', 0),
(73, 'QH001D006', 2, '上午', 1),
(74, 'QH001D006', 2, '下午', 1),
(75, 'QH001D006', 3, '上午', 0),
(76, 'QH001D006', 3, '下午', 0),
(77, 'QH001D006', 4, '上午', 1),
(78, 'QH001D006', 4, '下午', 1),
(79, 'QH001D006', 5, '上午', 0),
(80, 'QH001D006', 5, '下午', 0),
(81, 'QH001D006', 6, '上午', 1),
(82, 'QH001D006', 6, '下午', 1),
(83, 'QH001D006', 0, '上午', 0),
(84, 'QH001D006', 0, '下午', 0),
(85, 'QH002D001', 1, '上午', 1),
(86, 'QH002D001', 1, '下午', 1),
(87, 'QH002D001', 2, '上午', 0),
(88, 'QH002D001', 2, '下午', 0),
(89, 'QH002D001', 3, '上午', 1),
(90, 'QH002D001', 3, '下午', 1),
(91, 'QH002D001', 4, '上午', 0),
(92, 'QH002D001', 4, '下午', 0),
(93, 'QH002D001', 5, '上午', 1),
(94, 'QH002D001', 5, '下午', 1),
(95, 'QH002D001', 6, '上午', 0),
(96, 'QH002D001', 6, '下午', 0),
(97, 'QH002D001', 0, '上午', 1),
(98, 'QH002D001', 0, '下午', 1),
(99, 'QH002D002', 1, '上午', 0),
(100, 'QH002D002', 1, '下午', 0),
(101, 'QH002D002', 2, '上午', 1),
(102, 'QH002D002', 2, '下午', 1),
(103, 'QH002D002', 3, '上午', 0),
(104, 'QH002D002', 3, '下午', 0),
(105, 'QH002D002', 4, '上午', 1),
(106, 'QH002D002', 4, '下午', 1),
(107, 'QH002D002', 5, '上午', 0),
(108, 'QH002D002', 5, '下午', 0),
(109, 'QH002D002', 6, '上午', 1),
(110, 'QH002D002', 6, '下午', 1),
(111, 'QH002D002', 0, '上午', 0),
(112, 'QH002D002', 0, '下午', 0),
(113, 'QH002D003', 1, '上午', 1),
(114, 'QH002D003', 1, '下午', 1),
(115, 'QH002D003', 2, '上午', 0),
(116, 'QH002D003', 2, '下午', 0),
(117, 'QH002D003', 3, '上午', 1),
(118, 'QH002D003', 3, '下午', 1),
(119, 'QH002D003', 4, '上午', 0),
(120, 'QH002D003', 4, '下午', 0),
(121, 'QH002D003', 5, '上午', 1),
(122, 'QH002D003', 5, '下午', 1),
(123, 'QH002D003', 6, '上午', 0),
(124, 'QH002D003', 6, '下午', 0),
(125, 'QH002D003', 0, '上午', 1),
(126, 'QH002D003', 0, '下午', 1);

-- --------------------------------------------------------

--
-- 表的结构 `hospital`
--

CREATE TABLE `hospital` (
  `hos_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hos_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cant_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `hoslevel_code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT '/HOS/Public/images/default-hospital.png',
  `addr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msg` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `hospital`
--

INSERT INTO `hospital` (`hos_code`, `hos_name`, `cant_code`, `hoslevel_code`, `pic`, `addr`, `msg`, `tel`) VALUES
('QH001', '青岛大学附属医院', '10001', '1', '/Hos/Public/Uploads/59fee311620a8.gif', '青岛市江苏路16号', '附属医院始建于1898年，是山东省东部地区唯一的一所省属综合性教学医院。目前，医院本部占地6万平方米，东区占地7万平方米，总建筑面积达20万平方米，资产总额达20.6亿元，开放总床位1995张，职工2600余人,其中高级专业技术人员550余名，博士240余名，硕士500余名，留学归国人员近百名，国家、省市各级各类专业委员会主委、副主委、卫生部有突出贡献中青年专家、享受政府特贴专家、山东省"1020"人才工程等专家近200名。医院年门急诊量157万人次，出院5.3万人次，手术2.3万例，是科室齐全、设备先进、技术雄厚、环境优雅、建筑布局合理，集医疗、教学、科 学、科研、预防保健和康复为一体的区域龙头医院，是山东省东部地区医疗、教学、科研和人才培训中心。', '0532-96166'),
('QH002', '胶州市人民医院', '10007', '3', '/Hos/Public/Uploads/5a0172838ef00.jpg', '胶州市广州北路88号', '胶州市人民医院始建于1981年12月21日（1999年5月市中医医院与市人民医院合并）。2004年始设有南北两院，现已发展为集医疗、教学科研、急诊急救、预防保健、中西医结合为一体的综合性二级甲等医院。医院占地101亩，固定资产1.4亿元，医疗设备总值1.1亿元，编制床位620张，实际开放床位1108张。现有职工1158人，专业技术人员1031人，其中高级技术人员52人，中级技术人员227人。 建院以来，医院先后被评为山东省红十字会、先进单位山东省创建爱婴活动先进集体、青岛市卫生标兵单位、青岛市老干部服务工作先进单位、青岛市社会治安综合治理先进单位、青岛市文明标兵医院、青岛市文明示范医院、青岛市消费者满意单位，青岛市院前急救工作先进集体等。1994年10月经上级专家严格评审验收顺利晋升为“国家二级甲等医院”', '858656039'),
('QH003', '青岛市市立医院', '10002', '1', '/Hos/Public/Uploads/59fee70547283.jpg', '青岛市胶州路1号', '青岛市市立医院建院于1916年，拥有近百年发展历史，具有丰富的历史积淀和良好的社会信誉。上世纪九十年代，医院先后合并了青岛市皮肤病防治院、青岛市北九水疗养院、青岛市东部医院和青岛市人民医院等8个医疗单位，形成在岛城东、西、北连锁经营、多元化服务，在职职工3300余人，编制床位2000张，集医疗、教学、科研、保健疗养于一体的大型医院集团。走进新世纪，青岛市市立医院（集团）开始向管理要效益，确定了集团组织架构和八统一的管理要求，采用“松紧结合，监助并举，奖惩公开”的管理理念，确立了协同合作，优势发展，全院整体运营的管理模式，顺利通过ISO9001：2000质量认证。一系列改革措施，使医院一步 院一步步走向繁荣发展的新时期，尤其是新院区各项指标更是每年平均以60%--100%的速度递增，创造了3年从“零”到三级甲等医院规模的跨越，成为青岛市东部新区名副其实的医疗中心。 ', '0532-82836450'),
('QH004', '青岛市中心医疗集团', '10002', '1', '/Hos/Public/Uploads/59fee741ac654.JPG', '山东省青岛市四方区四流南路127号', '青岛市中心医疗集团以综合性“三甲”医院为基础，重点突出以肿瘤诊治为特色的多学科交叉发展。通过不断夯实&quot;大综合&quot;的基础势力，为&quot;强专科&quot;提供有力支撑，从而实现了与青岛市肿瘤医院和青岛市职业病医院平稳、有序整合的战略。集团坐落于美丽的胶州湾畔，跨海大桥高架桥南侧', '0532-84855192'),
('QH005', '山东大学齐鲁医院', '10002', '1', '/Hos/Public/Uploads/59fee793bded9.jpg', '青岛市合肥路758号', '山东大学齐鲁医院（青岛）是山东大学与青岛市人民政府战略合作框架的重要组成部分，也是山东大学齐鲁医院“十二五”期间深化改革、加快发展的重要战略举措。医院于2013年12月26日开诊。 山东大学齐鲁医院（青岛）位于青岛市合肥路758号。一期项目占地面积36亩，建筑面积8.4万平方米，设置床位1000张，停车车位近400个', '0532-96599'),
('QH006', '青岛眼科医院', '10001', '1', '/Hos/Public/Uploads/59fee7cc5f6ea.jpg', '山东省青岛市燕儿岛路5号', '黄海之滨-浮山湾畔-坐落着中华眼科学界的璀璨明珠山东省眼科研究所青岛眼科医院。 青岛眼科医院是经山东省卫生厅批准成立的集医疗、科研、教学、防盲为一体的省属三级眼科专科医院-隶属于山东省医学科学院。院长由国内唯一的眼科学院士、中央联系的保健专家、首届“山东省十大名医”谢立信教授担任', '0532-85876380'),
('QH007', '青岛市第八人民医院', '10005', '2', '/Hos/Public/Uploads/59fee81693962.jpg', '青岛市李沧区峰山路84号', '刀鮗市第八人民医院始建于1951年，是一所集医疗、科研、教学、预防、保健、康复和急救于一体的大型综合性三级医院，是青岛市政府确定的四大医疗集团之一，是青岛市涉外定点医院，“模范爱婴医院”，并称潍坊医学院附属青岛医院、北京大学第一医院协作医院、济宁医学院教学医院、青岛市心胸外科研究所', '0532-87895264');

-- --------------------------------------------------------

--
-- 表的结构 `hos_admin`
--

CREATE TABLE `hos_admin` (
  `hosadmin_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hosadmin_pwd` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hosadmin_tel` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `hos_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `hos_admin`
--

INSERT INTO `hos_admin` (`hosadmin_name`, `hosadmin_pwd`, `hosadmin_tel`, `hos_code`) VALUES
('HA001', '123', '17854676355', 'QH001'),
('HA002', '123', '15989876555', 'QH002'),
('HA003', '123', '15897834234', 'QH003'),
('HA004', '123', '17898786545', 'QH004'),
('HA005', '123', '13687896575', 'QH005'),
('HA006', '123', '15678789733', 'QH006'),
('HA007', '123', '17887976542', 'QH007');

-- --------------------------------------------------------

--
-- 表的结构 `hos_level`
--

CREATE TABLE `hos_level` (
  `hoslevel_code` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `hoslevel_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `hos_level`
--

INSERT INTO `hos_level` (`hoslevel_code`, `hoslevel_name`) VALUES
('1', '三级甲等'),
('2', '三级乙等'),
('3', '二级甲等'),
('4', '二级乙等');

-- --------------------------------------------------------

--
-- 表的结构 `patient`
--

CREATE TABLE `patient` (
  `p_id` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `p_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_tel` char(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `p_tel`) VALUES
('41080219960423005X', '郭雅之', '17854234948'),
('41080219960423006X', '张子然', '17854234949'),
('41080219960423007X', '张欣媛', '17854234950'),
('41080219960423008X', '李艺鸣', '17854234951');

-- --------------------------------------------------------

--
-- 表的结构 `stop_schedule`
--

CREATE TABLE `stop_schedule` (
  `stop_code` int(11) NOT NULL,
  `dut_code` int(11) NOT NULL,
  `begin_date` date NOT NULL,
  `end_date` date NOT NULL,
  `apply_date` datetime NOT NULL,
  `stop_status` int(11) NOT NULL DEFAULT '1',
  `apply_reason` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `refuse_reason` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `time_schedule`
--

CREATE TABLE `time_schedule` (
  `time_code` int(11) NOT NULL,
  `time_content` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `time_range` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `time_schedule`
--

INSERT INTO `time_schedule` (`time_code`, `time_content`, `time_range`) VALUES
(1, '9:00-10:00', '上午'),
(2, '10:00-11:00', '上午'),
(3, '11:00-12:00', '上午'),
(4, '15:00-16:00', '下午'),
(5, '16:00-17:00', '下午'),
(6, '17:00-18:00', '下午');

-- --------------------------------------------------------

--
-- 表的结构 `treatment`
--

CREATE TABLE `treatment` (
  `t_code` int(11) NOT NULL,
  `dut_code` int(11) NOT NULL,
  `p_id` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `t_date` date NOT NULL,
  `t_status` int(11) NOT NULL DEFAULT '1',
  `time_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `untreatment`
--

CREATE TABLE `untreatment` (
  `t_code` int(11) NOT NULL,
  `p_id` char(18) COLLATE utf8_unicode_ci NOT NULL,
  `t_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `cant`
--
ALTER TABLE `cant`
  ADD PRIMARY KEY (`cant_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`hos_code`,`dep_code`),
  ADD KEY `FK_Reference_5` (`dic_item`,`dic_code`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`dic_item`);

--
-- Indexes for table `dictionary_item`
--
ALTER TABLE `dictionary_item`
  ADD PRIMARY KEY (`dic_item`,`dic_code`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_code`),
  ADD KEY `FK_Reference_7` (`hos_code`,`dep_code`),
  ADD KEY `FK_Reference_8` (`doclevel_code`);

--
-- Indexes for table `doc_level`
--
ALTER TABLE `doc_level`
  ADD PRIMARY KEY (`doclevel_code`);

--
-- Indexes for table `duty_schedule`
--
ALTER TABLE `duty_schedule`
  ADD PRIMARY KEY (`dut_code`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hos_code`),
  ADD KEY `FK_Reference_1` (`cant_code`),
  ADD KEY `FK_Reference_2` (`hoslevel_code`);

--
-- Indexes for table `hos_admin`
--
ALTER TABLE `hos_admin`
  ADD PRIMARY KEY (`hosadmin_name`),
  ADD KEY `FK_Reference_3` (`hos_code`);

--
-- Indexes for table `hos_level`
--
ALTER TABLE `hos_level`
  ADD PRIMARY KEY (`hoslevel_code`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `stop_schedule`
--
ALTER TABLE `stop_schedule`
  ADD PRIMARY KEY (`stop_code`),
  ADD KEY `FK_stop_schedule_1` (`dut_code`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`time_code`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`t_code`),
  ADD KEY `FK_treatment_2` (`p_id`),
  ADD KEY `FK_treatment_3` (`time_code`),
  ADD KEY `dut_code_2` (`dut_code`);

--
-- Indexes for table `untreatment`
--
ALTER TABLE `untreatment`
  ADD PRIMARY KEY (`t_code`),
  ADD KEY `FK_untreatment_2` (`p_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `duty_schedule`
--
ALTER TABLE `duty_schedule`
  MODIFY `dut_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- 使用表AUTO_INCREMENT `stop_schedule`
--
ALTER TABLE `stop_schedule`
  MODIFY `stop_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `treatment`
--
ALTER TABLE `treatment`
  MODIFY `t_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- 限制导出的表
--

--
-- 限制表 `blacklist`
--
ALTER TABLE `blacklist`
  ADD CONSTRAINT `FK_blacklist_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);

--
-- 限制表 `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `FK_Reference_5` FOREIGN KEY (`dic_item`,`dic_code`) REFERENCES `dictionary_item` (`dic_item`, `dic_code`),
  ADD CONSTRAINT `FK_Reference_6` FOREIGN KEY (`hos_code`) REFERENCES `hospital` (`hos_code`);

--
-- 限制表 `dictionary_item`
--
ALTER TABLE `dictionary_item`
  ADD CONSTRAINT `FK_Reference_4` FOREIGN KEY (`dic_item`) REFERENCES `dictionary` (`dic_item`);

--
-- 限制表 `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK_Reference_7` FOREIGN KEY (`hos_code`,`dep_code`) REFERENCES `department` (`hos_code`, `dep_code`),
  ADD CONSTRAINT `FK_Reference_8` FOREIGN KEY (`doclevel_code`) REFERENCES `doc_level` (`doclevel_code`);

--
-- 限制表 `hospital`
--
ALTER TABLE `hospital`
  ADD CONSTRAINT `FK_Reference_1` FOREIGN KEY (`cant_code`) REFERENCES `cant` (`cant_code`),
  ADD CONSTRAINT `FK_Reference_2` FOREIGN KEY (`hoslevel_code`) REFERENCES `hos_level` (`hoslevel_code`);

--
-- 限制表 `hos_admin`
--
ALTER TABLE `hos_admin`
  ADD CONSTRAINT `FK_Reference_3` FOREIGN KEY (`hos_code`) REFERENCES `hospital` (`hos_code`);

--
-- 限制表 `stop_schedule`
--
ALTER TABLE `stop_schedule`
  ADD CONSTRAINT `FK_stop_schedule_1` FOREIGN KEY (`dut_code`) REFERENCES `duty_schedule` (`dut_code`);

--
-- 限制表 `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `FK_treatment_1` FOREIGN KEY (`dut_code`) REFERENCES `duty_schedule` (`dut_code`),
  ADD CONSTRAINT `FK_treatment_2` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`),
  ADD CONSTRAINT `FK_treatment_3` FOREIGN KEY (`time_code`) REFERENCES `time_schedule` (`time_code`);

--
-- 限制表 `untreatment`
--
ALTER TABLE `untreatment`
  ADD CONSTRAINT `FK_untreatment_1` FOREIGN KEY (`t_code`) REFERENCES `treatment` (`t_code`),
  ADD CONSTRAINT `FK_untreatment_2` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`);

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`root`@`localhost` EVENT `event_blacklist` ON SCHEDULE EVERY 1 DAY STARTS '2017-11-16 00:00:00' ON COMPLETION PRESERVE ENABLE DO delete from blacklist where end_date=current_date()$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
