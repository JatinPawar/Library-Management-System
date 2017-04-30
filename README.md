# Library-Management-System
This is Online Library Management System.I have use HTML,PHP,MySql to create this system.This runs on XAMPP local server.A total of 3 tables are used for this system i.e. book, student, infobook.
The table named book contains the information of all the books that are present in the library.
The table named student keeps a record of all the registed students.
The table named infobook keeps a track of the booksissued to students and their issue date and return date.

In this project there are 6 pages:-

1)Home Page             : Acts as a presentation to tell what the project is all about.
2)Student Registration  : Register students as only the students who are registered can issue a book.
3)Find Book             : Finds a book based on the title.(You just need to enter a matching title of a book which is in the library.)
4)Issue Book            : Issues the book to a particular student.
5)Return Book           : Returns the book.
6)Add Book              : Adds book to the library.(i.e. books entered from here are available in the library.)

Steps:-

1)First intall XAMPP on your computer.

2)Download the files given here.

3)Extract the files and copy the folder named "LiB" into htdocs folder.(You will find htdocs under xampp....So locate where you have installed XAMPP on your PC and then navigate to htdocs folder)

4)Now create a database named "library" in phpmyadmin.(Start you XAMPP. Start Apache and MySQL.Then go to "localhost:80/phpmyadmin" and create the database here)

5)Now export the "library.sql" given in the "Lib" folder(which you copied into the htdocs) into the database you created in step 4.

6)Now you are all set to go.........So go browser and call the addbook.php.(i.e "localhost:80/LiB/addbook.php")

Note:-
    When you start the Library System there are no registered students and no books are added in the library.
    So, first of all register some students.(Always remember that the roll number of two students can not be same.)
    Then add books and then try to issue them.
