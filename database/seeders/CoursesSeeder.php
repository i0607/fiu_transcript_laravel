<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
{
    public function run()
    {

        $courses = [
               // SEMESTER 1
            ['code' => 'MATH121', 'title' => 'CALCULUS-I', 'credits' => 4, 'category' => 'FC', 'semester' => 1, 'ects' => 6],
            ['code' => 'MATH123', 'title' => 'DISCRETE MATHEMATICS', 'credits' => 3, 'category' => 'FC', 'semester' => 1, 'ects' => 5],
            ['code' => 'PHYS121', 'title' => 'PHYSICS-I', 'credits' => 3, 'category' => 'FC', 'semester' => 1, 'ects' => 5],
            ['code' => 'ENGR101', 'title' => 'INFORMATION TECHNOLOGY AND APPLICATIONS', 'credits' => 2, 'category' => 'FC', 'semester' => 1, 'ects' => 2],
            ['code' => 'ENGR103', 'title' => 'COMPUTER PROGRAMMING-I', 'credits' => 3, 'category' => 'FC', 'semester' => 1, 'ects' => 5],
            ['code' => 'ENGL121', 'title' => 'ENGLISH-I', 'credits' => 3, 'category' => 'UC', 'semester' => 1, 'ects' => 4],
            ['code' => 'TURK131', 'title' => 'TURKISH AS A FOREIGN LANGUAGE-I', 'credits' => 2, 'category' => 'UC', 'semester' => 1, 'ects' => 3],
            ['code' => 'TUOG101', 'title' => 'TURKISH LANGUAGE-I', 'credits' => 2, 'category' => 'UC', 'semester' => 1, 'ects' => 3],
            ['code' => 'TUOG101/TURK131', 'title' => 'TURKISH LANGUAGE-I/TURKISH AS A FOREIGN LANGUAGE-I', 'credits' => 2, 'category' => 'UC', 'semester' => 1, 'ects' => 3],
            ['code' => 'TARH101/HIST111', 'title' => ' ATATURKS PRINCIPLES AND HISTORY OF TURKISH REFORMS-I', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],
            ['code' => 'TUOG102/TURK132', 'title' => 'TURKISH LANGUAGE-I/TURKISH AS A FOREIGN LANGUAGE-I', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],

            // SEMESTER 2
            ['code' => 'MATH122', 'title' => 'CALCULUS-II', 'credits' => 4, 'category' => 'FC', 'semester' => 2, 'ects' => 6],
            ['code' => 'MATH124', 'title' => 'LINEAR ALGEBRA', 'credits' => 3, 'category' => 'FC', 'semester' => 2, 'ects' => 5],
            ['code' => 'PHYS122', 'title' => 'PHYSICS-II', 'credits' => 4, 'category' => 'FC', 'semester' => 2, 'ects' => 5],
            ['code' => 'ENGR104', 'title' => 'COMPUTER PROGRAMMING-II', 'credits' => 3, 'category' => 'FC', 'semester' => 2, 'ects' => 4],
            ['code' => 'ENGL122', 'title' => 'ENGLISH-II', 'credits' => 3, 'category' => 'UC', 'semester' => 2, 'ects' => 4],
            ['code' => 'HIST111', 'title' => 'ATATURK\'S PRINCIPLES AND HISTORY OF TURKISH REFORMS-I', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],
            ['code' => 'TARH101', 'title' => 'ATATURK\'S PRINCIPLES AND HISTORY OF TURKISH REFORMS-I', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],
            ['code' => 'TURK132', 'title' => 'TURKISH AS A FOREIGN LANGUAGE-II', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],
            ['code' => 'TUOG102', 'title' => 'TURKISH LANGUAGE-II', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 3],

            // SEMESTER 3
            ['code' => 'ELEE211', 'title' => 'DIGITAL LOGIC DESIGN', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'ELEE231', 'title' => 'CIRCUIT THEORY-I', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'CMPE215', 'title' => 'ALGORITHMS AND DATA STRUCTURES', 'credits' => 3, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'MATH225', 'title' => 'DIFFERENTIAL EQUATIONS', 'credits' => 4, 'category' => 'FC', 'semester' => 3, 'ects' => 5],
            ['code' => 'HIST112', 'title' => 'ATATURK\'S PRINCIPLES AND HISTORY OF TURKISH REFORMS-II', 'credits' => 2, 'category' => 'UC', 'semester' => 3, 'ects' => 3],
            ['code' => 'TARH102', 'title' => 'ATATURK\'S PRINCIPLES AND HISTORY OF TURKISH REFORMS-II', 'credits' => 2, 'category' => 'UC', 'semester' => 3, 'ects' => 3],

            // SEMESTER 4
            ['code' => 'STAT226', 'title' => 'PROBABILITY AND STATISTICS', 'credits' => 3, 'category' => 'FC', 'semester' => 4, 'ects' => 6],
            ['code' => 'CMPE216', 'title' => 'OBJECT ORIENTED PROGRAMMING', 'credits' => 3, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'CMPE232', 'title' => 'OPERATING SYSTEMS', 'credits' => 3, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'CMPE252', 'title' => 'ANALYSIS OF ALGORITHMS', 'credits' => 4, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'ENGR215', 'title' => 'RESEARCH METHODS FOR ENGINEERING AND ARCHITECTURE', 'credits' => 2, 'category' => 'FC', 'semester' => 4, 'ects' => 3],
            ['code' => 'OHSA206', 'title' => 'OCCUPATIONAL HEALTH AND SAFETY', 'credits' => 3, 'category' => 'FC', 'semester' => 4, 'ects' => 3],

            // SEMESTER 5
            ['code' => 'CMPE321', 'title' => 'MICROPROCESSORS', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
            ['code' => 'CMPE341', 'title' => 'DATABASE SYSTEMS', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 5],
            ['code' => 'ELEE341', 'title' => 'ELECTRONICS-I', 'credits' => 4, 'category' => 'FE', 'semester' => 5, 'ects' => 6],
            ['code' => 'ELEE341', 'title' => 'ELECTRONICS-I', 'credits' => 4, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE343', 'title' => 'SOFTWARE ANALYSIS AND DESIGN', 'credits' => 3, 'category' => 'AC', 'semester' => 5, 'ects' => 5],
            ['code' => 'SFWE344', 'title' => 'SOFTWARE PROJECT MANAGEMENT', 'credits' => 2, 'category' => 'AC', 'semester' => 6, 'ects' => 4],

            // SEMESTER 6
            ['code' => 'MATH328', 'title' => 'NUMERICAL ANALYSIS', 'credits' => 3, 'category' => 'FC', 'semester' => 6, 'ects' => 6],
            ['code' => 'CMPE324', 'title' => 'COMPUTER ARCHITECTURE', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 5],
            ['code' => 'CMPE322', 'title' => 'DATA COMMUNICATION AND COMPUTER NETWORKS', 'credits' => 4, 'category' => 'FE', 'semester' => 6, 'ects' => 6],
            ['code' => 'CMPE322', 'title' => 'DATA COMMUNICATION AND COMPUTER NETWORKS', 'credits' => 4, 'category' => 'FE', 'semester' => null, 'ects' => 6],

            // SEMESTER 7
            ['code' => 'CMPE403', 'title' => 'SUMMER TRAINING', 'credits' => 0, 'category' => 'AC', 'semester' => 7, 'ects' => 2],
            ['code' => 'ENGR401', 'title' => 'ENGINEERING DESIGN-I', 'credits' => 2, 'category' => 'FC', 'semester' => 7, 'ects' => 6],
            ['code' => 'CMPE421', 'title' => 'PROGRAMMING LANGUAGES', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 6],
            ['code' => 'CMPEXX1', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 2],
            ['code' => 'CMPEXX2', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 6],
            ['code' => 'CMPEXX3', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 6],
            ['code' => 'CMPEXX4', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 6],

            // SEMESTER 8
            ['code' => 'ENGR402', 'title' => 'ENGINEERING DESIGN-II', 'credits' => 2, 'category' => 'FC', 'semester' => 8, 'ects' => 10],
            ['code' => 'ENGR404', 'title' => 'ENGINEERING ATTRIBUTES AND ETHICS', 'credits' => 2, 'category' => 'FC', 'semester' => 8, 'ects' => 3],

            // AREA ELECTIVE COURSES (AE)
            ['code' => 'CMPE422', 'title' => 'REAL-TIME SYSTEMS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE422', 'title' => 'REAL-TIME SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE431', 'title' => 'ADVANCED COMPUTER NETWORKS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE432', 'title' => 'WIRELESS COMMUNICATION NETWORKS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE433', 'title' => 'WIRELESS SENSOR NETWORKS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE434', 'title' => 'INFORMATION AND NETWORK SECURITY', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE455', 'title' => 'MODERN PROGRAMMING PLATFORMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE461', 'title' => 'COMPUTING SYSTEMS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE462', 'title' => 'SERVICE-ORIENTED COMPUTING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE463', 'title' => 'CLOUD COMPUTING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE464', 'title' => 'ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE465', 'title' => 'NEURAL NETWORKS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE466', 'title' => 'EXPERT SYSTEMS', 'credits' => 4, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE474', 'title' => 'INTRODUCTION TO PARALLEL COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE475', 'title' => 'ARTIFICIAL INTELLIGENCE TOOLS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'CMPE476', 'title' => 'DIGITAL FORENSICS AND INVESTIGATIONS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE426', 'title' => 'EMBEDDED SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE434', 'title' => 'INFORMATION AND NETWORK SECURITY', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE455', 'title' => 'MODERN PROGRAMMING PLATFORMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE474', 'title' => 'INTRODUCTION TO PARALLEL COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE475', 'title' => 'ARTIFICIAL INTELLIGENCE TOOLS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE476', 'title' => 'DIGITAL FORENSICS AND INVESTIGATIONS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'ELEE426', 'title' => 'EMBEDDED SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE431', 'title' => 'ADVANCED COMPUTER NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE432', 'title' => 'WIRELESS COMMUNICATION NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE433', 'title' => 'WIRELESS SENSOR NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE461', 'title' => 'COMPUTING SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE462', 'title' => 'SERVICE-ORIENTED COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE463', 'title' => 'CLOUD COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE464', 'title' => 'ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE465', 'title' => 'NEURAL NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
['code' => 'CMPE466', 'title' => 'EXPERT SYSTEMS', 'credits' => 4, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            // FACULTY ELECTIVE COURSES (FE)
            ['code' => 'CHEM121', 'title' => 'CHEMISTRY', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],
            ['code' => 'MATH228', 'title' => 'ENGINEERING MATHEMATICS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE331', 'title' => 'SIGNALS AND SYSTEMS', 'credits' => 4, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE362', 'title' => 'COMMUNICATION SYSTEMS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],
            ['code' => 'ELEE431', 'title' => 'DIGITAL SIGNAL PROCESSING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE315', 'title' => 'VISUAL PROGRAMMING', 'credits' => 3, 'category' => 'AC', 'semester' => 5, 'ects' => 5],
            ['code' => 'SFWE315', 'title' => 'VISUAL PROGRAMMING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE434', 'title' => 'CRYPTOGRAPHY', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE316', 'title' => 'INTERNET AND WEB PROGRAMMING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE316', 'title' => 'INTERNET AND WEB PROGRAMMING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE415', 'title' => 'SOFTWARE ARCHITECTURE', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 6],
            ['code' => 'SFWE415', 'title' => 'SOFTWARE ARCHITECTURE', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE411', 'title' => 'SOFTWARE VALIDATION & TESTING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE411', 'title' => 'SOFTWARE VALIDATION & TESTING', 'credits' => 3, 'category' => 'AC', 'semester' => 8, 'ects' => 6],
            ['code' => 'SFWE403', 'title' => 'SUMMER TRAINING', 'credits' => 0, 'category' => 'AC', 'semester' => 7, 'ects' => 2],
            ['code' => 'AINE301', 'title' => 'BASIC SEARCH METHODS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],
            ['code' => 'AINE312', 'title' => 'DATA SCIENCE', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],
            ['code' => 'AINE334', 'title' => 'KNOWLEDGE REPRESENTATION AND REASONING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],
            ['code' => 'MECE215', 'title' => 'BASIC MECHANICS: STATICS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],

            // UNIVERSITY ELECTIVE COURSES (UE) - Common ones from transcripts
            ['code' => 'HESC109', 'title' => 'BASIC FIRST AID', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 4],
            ['code' => 'SOCI320', 'title' => 'WOMEN AND SOCIETY', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 4],
            ['code' => 'BUSN101', 'title' => 'PRINCIPLES OF MANAGEMENT-I', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 5],
            ['code' => 'ITAL101', 'title' => 'ITALIAN-I', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 4],

            // OTHER COURSES FROM TRANSCRIPTS
            ['code' => 'GRAD282', 'title' => 'INTRODUCTION TO GRAPHIC DESIGN', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 4],
            ['code' => 'COMP464', 'title' => 'ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 7],
         ['code' => 'MATH101', 'title' => 'CALCULUS I', 'credits' => 4, 'category' => 'FC', 'semester' => 1, 'ects' => 6],
            ['code' => 'MATH103', 'title' => 'DISCRETE MATHEMATICS', 'credits' => 3, 'category' => 'FC', 'semester' => 1, 'ects' => 6],
            ['code' => 'SOFT100', 'title' => 'COMPUTER FUNDAMENTALS AND INTRODUCTION TO PROGRAMMING', 'credits' => 3, 'category' => 'FC', 'semester' => 1, 'ects' => 3],
            ['code' => 'SOFT103', 'title' => 'COMPUTER LITERACY & INTRODUCTION TO INFORMATION TECHNOLOGY', 'credits' => 2, 'category' => 'FC', 'semester' => 1, 'ects' => 3],
            ['code' => 'PHYS101', 'title' => 'PHYSICS I', 'credits' => 4, 'category' => 'FC', 'semester' => 1, 'ects' => 6],
            ['code' => 'ENGL101', 'title' => 'ENGLISH I', 'credits' => 3, 'category' => 'UC', 'semester' => 1, 'ects' => 6],

            // YEAR 1 - SPRING SEMESTER (Semester 2)
            ['code' => 'MATH102', 'title' => 'CALCULUS II', 'credits' => 4, 'category' => 'FC', 'semester' => 2, 'ects' => 6],
            ['code' => 'MATH104', 'title' => 'LINEAR ALGEBRA', 'credits' => 3, 'category' => 'FC', 'semester' => 2, 'ects' => 5],
            ['code' => 'SOFT104', 'title' => 'COMPUTER PROGRAMMING', 'credits' => 4, 'category' => 'FC', 'semester' => 2, 'ects' => 5],
            ['code' => 'PHYS102', 'title' => 'PHYSICS II', 'credits' => 4, 'category' => 'FC', 'semester' => 2, 'ects' => 6],
            ['code' => 'ENGL102', 'title' => 'ENGLISH II', 'credits' => 3, 'category' => 'UC', 'semester' => 2, 'ects' => 6],
            ['code' => 'HIST100', 'title' => 'HISTORY OF TURKISH REPUBLIC', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 2],
            ['code' => 'TURK100', 'title' => 'TURKISH AS A SECOND LANGUAGE', 'credits' => 2, 'category' => 'UC', 'semester' => 2, 'ects' => 2],

            // YEAR 2 - FALL SEMESTER (Semester 3)
            ['code' => 'MATH205', 'title' => 'DIFFERENTIAL EQUATIONS', 'credits' => 4, 'category' => 'FC', 'semester' => 3, 'ects' => 6],
            ['code' => 'SOFT215', 'title' => 'DATA STRUCTURES', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'SOFT235', 'title' => 'ELECTRICAL CIRCUITS FOR SOFTWARE ENGINEERS', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 4],
            ['code' => 'COMP225', 'title' => 'DIGITAL LOGIC DESIGN', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'ENGL201', 'title' => 'ENGLISH III', 'credits' => 2, 'category' => 'FC', 'semester' => 3, 'ects' => 4],
            ['code' => 'GEED-01', 'title' => 'GENERAL EDUCATION ELECTIVE I', 'credits' => 3, 'category' => 'UE', 'semester' => 3, 'ects' => 4],
            ['code' => 'COMP100', 'title' => 'Fundamentals of Computer Eng', 'credits' => 3, 'category' => 'AC', 'semester' => 1, 'ects' => 3],
            ['code' => 'COMP103', 'title' => 'Information Technology and Applications ', 'credits' => 2, 'category' => 'UC', 'semester' => 1, 'ects' => 3],
            ['code' => 'COMP104', 'title' => 'Computer Programming', 'credits' => 4, 'category' => 'UC', 'semester' => 2, 'ects' => 6],
            ['code' => 'COMP215', 'title' => 'Algorithms and Data Structures', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'ELEC235', 'title' => 'Electrical Circuits', 'credits' => 4, 'category' => 'AC', 'semester' => 3, 'ects' => 6],

            // YEAR 2 - SPRING SEMESTER (Semester 4)
            ['code' => 'MATH206', 'title' => 'PROBABILITY AND STATISTICS', 'credits' => 3, 'category' => 'FC', 'semester' => 4, 'ects' => 5],
            ['code' => 'SOFT252', 'title' => 'ANALYSIS OF ALGORITHMS', 'credits' => 4, 'category' => 'AC', 'semester' => 4, 'ects' => 8],
            ['code' => 'SOFT254', 'title' => 'AUTOMATA THEORY', 'credits' => 3, 'category' => 'AC', 'semester' => 4, 'ects' => 7],
            ['code' => 'COMP216', 'title' => 'OBJECT ORIENTED PROGRAMMING', 'credits' => 4, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'COMP232', 'title' => 'Operating Systems', 'credits' => 3, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'ELEC240', 'title' => 'ELECTRONICS', 'credits' => 3, 'category' => 'AC', 'semester' => 4, 'ects' => 5],
            ['code' => 'HIST100/TURK100', 'title' => 'History of Turkish Republic/Turkish as a Second Language', 'credits' => 2, 'category' => 'UC', 'semester' => 4, 'ects' => 2],
            ['code' => 'GEED-02', 'title' => 'GENERAL EDUCATION ELECTIVE II', 'credits' => 3, 'category' => 'UE', 'semester' => 4, 'ects' => 4],

            // YEAR 3 - FALL SEMESTER (Semester 5)
            ['code' => 'MATH309', 'title' => 'NUMERICAL ANALYSIS', 'credits' => 3, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
            ['code' => 'SOFT315', 'title' => 'VISUAL PROGRAMMING', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 5],
            ['code' => 'SOFT321', 'title' => 'MACHINE LANGUAGE AND MICROPROCESSORS', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
            ['code' => 'SOFT341', 'title' => 'DATABASE DESIGN AND MANAGEMENT', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
            ['code' => 'SOFT343', 'title' => 'SOFTWARE ENGINEERING ANALYSIS AND DESIGN', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
            ['code' => 'SOFT299', 'title' => 'SUMMER TRAINING I', 'credits' => 0, 'category' => 'FC', 'semester' => 5, 'ects' => 1],

            // YEAR 3 - SPRING SEMESTER (Semester 6)
            ['code' => 'SOFT316', 'title' => 'INTERNET & WEB PROGRAMMING', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 6],
            ['code' => 'SOFT332', 'title' => 'OPERATING SYSTEMS', 'credits' => 4, 'category' => 'AC', 'semester' => 6, 'ects' => 5],
            ['code' => 'SOFT342', 'title' => 'SOFTWARE PROJECT MANAGEMENT', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 5],
            ['code' => 'TE1', 'title' => 'TECHNICAL ELECTIVE I', 'credits' => 3, 'category' => 'AE', 'semester' => 6, 'ects' => 5],
            ['code' => 'COMP352', 'title' => 'PROGRAMMING LANGUAGES', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 5],
            ['code' => 'GEED-03', 'title' => 'GENERAL EDUCATION ELECTIVE III', 'credits' => 3, 'category' => 'UE', 'semester' => 7, 'ects' => 4],
['code' => 'COMP321', 'title' => 'MICROPROCESSORS', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
['code' => 'COMP333', 'title' => 'SYSTEMS PROGRAMMING', 'credits' => 3, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
['code' => 'COMP341', 'title' => 'DATABASE SYSTEMS', 'credits' => 4, 'category' => 'AC', 'semester' => 5, 'ects' => 6],
['code' => 'COMP351', 'title' => 'ANALYSIS OF ALGORITHMS', 'credits' => 3, 'category' => 'AC', 'semester' => 5, 'ects' => 6],

// YEAR 3 - SPRING
['code' => 'COMP322', 'title' => 'SIGNALS AND SYSTEMS', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 6],
['code' => 'COMP324', 'title' => 'COMPUTER ARCHITECTURE', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 5],
['code' => 'COMP332', 'title' => 'DATA COMMUNICATION AND COMPUTER NETWORKS', 'credits' => 4, 'category' => 'AC', 'semester' => 6, 'ects' => 6],
['code' => 'COMP342', 'title' => 'SOFTWARE ENGINEERING', 'credits' => 4, 'category' => 'AC', 'semester' => 6, 'ects' => 6],

// YEAR 4 - FALL
['code' => 'COMP401', 'title' => 'ENGINEERING DESIGN I', 'credits' => 3, 'category' => 'FC', 'semester' => 7, 'ects' => 6],
['code' => 'COMP403', 'title' => 'SUMMER TRAINING', 'credits' => 0, 'category' => 'FC', 'semester' => 7, 'ects' => 1],
['code' => 'COMP471', 'title' => 'COMPUTER SIMULATION', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 6],
['code' => 'TE-01', 'title' => 'TECHNICAL ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 7],
['code' => 'TE-02', 'title' => 'TECHNICAL ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 7],
['code' => 'GEED-03', 'title' => 'GENERAL EDUCATION ELECTIVE III', 'credits' => 3, 'category' => 'UE', 'semester' => 7, 'ects' => 4],

// YEAR 4 - SPRING
['code' => 'COMP402', 'title' => 'ENGINEERING DESIGN II', 'credits' => 4, 'category' => 'FC', 'semester' => 8, 'ects' => 8],
['code' => 'COMP404', 'title' => 'ENGINEERING ATTRIBUTES & ETHICS', 'credits' => 2, 'category' => 'FC', 'semester' => 8, 'ects' => 3],
['code' => 'COMP454', 'title' => 'AUTOMATA THEORY', 'credits' => 3, 'category' => 'AC', 'semester' => 8, 'ects' => 6],
['code' => 'TE-03', 'title' => 'TECHNICAL ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 7],
['code' => 'TE-04', 'title' => 'TECHNICAL ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 7],
            // YEAR 4 - FALL SEMESTER (Semester 7)
            ['code' => 'SOFT401', 'title' => 'CAPSTONE PROJECT I', 'credits' => 3, 'category' => 'FC', 'semester' => 7, 'ects' => 6],
            ['code' => 'SOFT411', 'title' => 'SOFTWARE VALIDATION & TESTING', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 5],
            ['code' => 'SOFT415', 'title' => 'SOFTWARE ARCHITECTURE', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 4],
            ['code' => 'TE2', 'title' => 'TECHNICAL ELECTIVE II', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 7],
            ['code' => 'TE3', 'title' => 'TECHNICAL ELECTIVE III', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 7],
            ['code' => 'SOFT399', 'title' => 'SUMMER TRAINING II', 'credits' => 0, 'category' => 'FC', 'semester' => 7, 'ects' => 1],

            // YEAR 4 - SPRING SEMESTER (Semester 8)
            ['code' => 'SOFT402', 'title' => 'CAPSTONE PROJECT II', 'credits' => 4, 'category' => 'FC', 'semester' => 8, 'ects' => 9],
            ['code' => 'SOFT404', 'title' => 'ENGINEERING ATTRIBUTES & ETHICS', 'credits' => 2, 'category' => 'FC', 'semester' => 8, 'ects' => 3],
            ['code' => 'SOFT412', 'title' => 'SOFTWARE QUALITY ASSURANCE', 'credits' => 3, 'category' => 'AC', 'semester' => 8, 'ects' => 4],
            ['code' => 'TE4', 'title' => 'TECHNICAL ELECTIVE IV', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 7],
            ['code' => 'TE5', 'title' => 'TECHNICAL ELECTIVE V', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 7],

            // TECHNICAL ELECTIVE COURSES (Available for TE1-TE5)
            ['code' => 'COMP322', 'title' => 'SIGNALS AND SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 6],
            ['code' => 'COMP324', 'title' => 'COMPUTER ARCHITECTURE', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 5],
            ['code' => 'COMP332', 'title' => 'DATA COMMUNICATION AND COMPUTER NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 6],
            ['code' => 'SOFT421', 'title' => 'EMBEDDED SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT422', 'title' => 'MOBILE APPLICATION DEVELOPMENT', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT431', 'title' => 'HUMAN-COMPUTER INTERACTION', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT434', 'title' => 'CRYPTOGRAPHY AND NETWORK SECURITY', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT441', 'title' => 'ADVANCED DATABASE', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT442', 'title' => 'OBJECT-ORIENTED PROGRAMMING LANGUAGES & SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT444', 'title' => 'SOFTWARE CONSTRUCTION', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT445', 'title' => 'RAPID APPLICATION DEVELOPMENT', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT451', 'title' => 'INFORMATION RETRIEVAL', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT462', 'title' => 'SERVICE-ORIENTED COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT463', 'title' => 'CLOUD COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT464', 'title' => 'ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT465', 'title' => 'NEURAL NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT466', 'title' => 'EXPERT SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT467', 'title' => 'DATA MINING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT468', 'title' => 'PROCESS MINING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT472', 'title' => 'COMPUTER GRAPHICS', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT473', 'title' => 'DIGITAL IMAGE PROCESSING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'SOFT474', 'title' => 'INTRODUCTION TO PARALLEL COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => 0, 'ects' => 7],
            ['code' => 'ARCH281', 'title' => 'BASICS OF PHOTOGRAPHY', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 4],
            ['code' => 'FRNC101', 'title' => 'FRENCH-I', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 4],
            ['code' => 'COMP463', 'title' => 'CLOUD COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
            ['code' => 'COMP465', 'title' => 'NEURAL NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
            ['code' => 'AINE201', 'title' => 'FUNDAMENTALS OF ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'AC', 'semester' => 3, 'ects' => 6],
            ['code' => 'AINE204', 'title' => 'ARTIFICIAL INTELLIGENCE TOOLS', 'credits' => 4, 'category' => 'AC', 'semester' => 4, 'ects' => 6],
            ['code' => 'AINE332', 'title' => 'DEEP NEURAL NETWORKS', 'credits' => 3, 'category' => 'AC', 'semester' => 6, 'ects' => 6],
            ['code' => 'AINE403', 'title' => 'SUMMER TRAINING', 'credits' => 0, 'category' => 'FC', 'semester' => 7, 'ects' => 2],
            ['code' => 'AINE413', 'title' => 'MACHINE LEARNING', 'credits' => 3, 'category' => 'AC', 'semester' => 7, 'ects' => 6],

            // AI AREA ELECTIVES
            ['code' => 'AINEXX1', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'AINEXX2', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'AINEXX3', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'AINEXX4', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],

            // SPECIFIC AI AREA ELECTIVES
            ['code' => 'AINE471', 'title' => 'INTRODUCTION TO DATA ANALYSIS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'AINE481', 'title' => 'ETHICS OF ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],

            // FACULTY ELECTIVES (NEW)
            ['code' => 'ENGRXX1', 'title' => 'FACULTY ELECTIVE', 'credits' => 3, 'category' => 'FE', 'semester' => 5, 'ects' => 5],
            ['code' => 'ENGRXX2', 'title' => 'FACULTY ELECTIVE', 'credits' => 3, 'category' => 'FE', 'semester' => 6, 'ects' => 5],
            ['code' => 'ENGRXX3', 'title' => 'FACULTY ELECTIVE', 'credits' => 3, 'category' => 'FE', 'semester' => 6, 'ects' => 5],
            ['code' => 'ENGRXX4', 'title' => 'FACULTY ELECTIVE', 'credits' => 3, 'category' => 'FE', 'semester' => 8, 'ects' => 5],

            // UNIVERSITY ELECTIVES (NEW)
            ['code' => 'UNIEXX1', 'title' => 'UNIVERSITY ELECTIVE', 'credits' => 3, 'category' => 'UE', 'semester' => 3, 'ects' => 4],
            ['code' => 'UNIEXX2', 'title' => 'UNIVERSITY ELECTIVE', 'credits' => 3, 'category' => 'UE', 'semester' => 5, 'ects' => 4],
            ['code' => 'UNIEXX3', 'title' => 'UNIVERSITY ELECTIVE', 'credits' => 3, 'category' => 'UE', 'semester' => 6, 'ects' => 4],
            ['code' => 'UNIEXX4', 'title' => 'UNIVERSITY ELECTIVE', 'credits' => 3, 'category' => 'UE', 'semester' => 7, 'ects' => 4],
            // AREA ELECTIVES (NEW)
            ['code' => 'SFWEXX1', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 6, 'ects' => 6],
            ['code' => 'SFWEXX2', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 6],
            ['code' => 'SFWEXX3', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 7, 'ects' => 6],
            ['code' => 'SFWEXX4', 'title' => 'AREA ELECTIVE', 'credits' => 3, 'category' => 'AE', 'semester' => 8, 'ects' => 6],

            // ELECTRICAL/ELECTRONIC ELECTIVES FROM CURRICULUM
            ['code' => 'ELEE434', 'title' => 'DIGITAL CONTROL SYSTEMS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE442', 'title' => 'POWER ELECTRONICS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE451', 'title' => 'MICROWAVE THEORY', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE461', 'title' => 'COMMUNICATIONS SYSTEMS II', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE464', 'title' => 'WIRELESS SENSOR NETWORKS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE462', 'title' => 'WIRELESS COMMUNICATIONS', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE463', 'title' => 'INFORMATION THEORY', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE471', 'title' => 'HIGH VOLTAGE TECHNIQUES', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE474', 'title' => 'DIGITAL IMAGE PROCESSING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'ELEE435', 'title' => 'INTRODUCTION TO ROBOTICS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],

            // OTHER ENGINEERING COURSES
            ['code' => 'CVLE102', 'title' => 'ENGINEERING DRAWING', 'credits' => 3, 'category' => 'FE', 'semester' => null, 'ects' => 5],

            // SOFTWARE ENGINEERING AREA ELECTIVES (FROM CURRICULUM)
            ['code' => 'SFWE431', 'title' => 'HUMAN COMPUTER INTERACTION', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE412', 'title' => 'SOFTWARE QUALITY ASSURANCE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE422', 'title' => ' MOBILE APPLICATION DEVELOPMENT', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE441', 'title' => 'ADVANCE DATABASE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE442', 'title' => 'OBJECT-ORIENTED PROGRAMMING LANGUAGE AND SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE444', 'title' => 'SOFTWARE CONSTRUCTION', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE445', 'title' => 'RAPID APPLICATION DEVELOPMENT', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE451', 'title' => 'INFORMATION RETRIEVAL', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE468', 'title' => 'PROCESS MINING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE467', 'title' => 'DATA MINING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE472', 'title' => 'COMPUTER GRAPHICS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],
            ['code' => 'SFWE474', 'title' => 'INTRODUCTION TO PARALLEL COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 6],

            // MISSING PREP COURSES (if not already in your system)
            ['code' => 'PREP101', 'title' => 'ENGLISH PREP SCHOOL (A1-A1+)', 'credits' => 0, 'category' => 'UC', 'semester' => null, 'ects' => 0],
            ['code' => 'PREP102', 'title' => 'ENGLISH PREP SCHOOL (A1+-A2)', 'credits' => 0, 'category' => 'UC', 'semester' => null, 'ects' => 0],
            ['code' => 'PREP106', 'title' => 'ENGLISH PROFICIENCY TEST', 'credits' => 0, 'category' => 'UC', 'semester' => null, 'ects' => 0],

            // BUSINESS/ECONOMICS COURSES
            ['code' => 'ACCT201', 'title' => 'PRINCIPLES OF ACCOUNTING-I', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 6],
            ['code' => 'BUSN102', 'title' => 'PRINCIPLES OF MANAGEMENT-II', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 5],
            ['code' => 'ECON101', 'title' => 'INTRODUCTION TO ECONOMICS I', 'credits' => 3, 'category' => 'UE', 'semester' => null, 'ects' => 7],

            // STATISTICS COURSE (using different code from AI curriculum)
            ['code' => 'ISTA226', 'title' => 'PROBABILITY AND STATISTICS', 'credits' => 3, 'category' => 'FC', 'semester' => 4, 'ects' => 6],
            ['code' => 'ENGP070', 'title' => 'ENGLISH PROFICIENCY TEST', 'credits' => 0, 'category' => null, 'semester' => 0, 'ects' => 0],
            ['code' => 'COMP421', 'title' => 'EMBEDDED SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP422', 'title' => 'REAL-TIME SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP431', 'title' => 'ADVANCED COMPUTER NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP432', 'title' => 'WIRELESS COMMUNICATION NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP433', 'title' => 'WIRELESS SENSOR NETWORKS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP434', 'title' => 'INFORMATION AND NETWORK SECURITY', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP441', 'title' => 'DATABASE MANAGEMENT SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP442', 'title' => 'OBJECT-ORIENTED PROGRAMMING LANGUAGES & SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP443', 'title' => 'OBJECT-ORIENTED SYSTEMS ANALYSIS AND DESIGN', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP444', 'title' => 'SOFTWARE CONSTRUCTION', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP445', 'title' => 'RAPID APPLICATION DEVELOPMENT', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP461', 'title' => 'COMPUTING SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP462', 'title' => 'SERVICE-ORIENTED COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP464', 'title' => 'ARTIFICIAL INTELLIGENCE', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP466', 'title' => 'EXPERT SYSTEMS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP467', 'title' => 'DATA MINING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP472', 'title' => 'COMPUTER GRAPHICS', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP473', 'title' => 'DIGITAL IMAGE PROCESSING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
['code' => 'COMP474', 'title' => 'INTRODUCTION TO PARALLEL COMPUTING', 'credits' => 3, 'category' => 'AE', 'semester' => null, 'ects' => 7],
        ];

        // Insert data in batches of 20 records
        $chunks = array_chunk($courses, 20);
        foreach ($chunks as $chunk) {
            DB::table('courses')->insert($chunk);
        }
    }
}

