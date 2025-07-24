# Student Record Management System (PHP & MySQL)

A simple and functional Student Record Management System built using **Core PHP**, **MySQL**, **HTML**, **CSS**, and **JavaScript**. This project allows users to perform basic **CRUD (Create, Read, Update, Delete)** operations on student data.

---

## 🚀 Features

- ✅ **Add Student** – Insert new student records into the database  
- ✅ **View All Students** – Display student data in a responsive HTML table  
- ✅ **Update Student** – Modify existing student information using the unique ID  
- ✅ **Delete Student** – Remove a student record with confirmation prompt  
- ✅ **Confirmation Dialog** – JavaScript-based confirm popup before deletion  
- ✅ **Responsive UI** – Basic UI styling for a better user experience  
- ✅ **Clean Code Structure** – Simple file organization and logic separation  

---

## 🛠️ Technologies Used

| Technology | Purpose                     |
|------------|-----------------------------|
| PHP        | Backend logic               |
| MySQL      | Database management         |
| HTML/CSS   | Frontend structure and styling |
| JavaScript | Deletion confirmation dialog |
| XAMPP      | Local development environment |

---

## 📂 Project Structure

project-folder/
- ├── connect.php         # Database connection file
- ├── read.php            # Displays all student records
- ├── update.php          # Form to update student data
- ├── delete.php          # Logic to delete a student (with confirmation)
- ├── add.php (optional)  # Add new student (if implemented)
- └── style.css (optional) # Styles for buttons/table




---

## 🧠 How It Works

1. **read.php** fetches all students from the database and displays them in a table.
2. Each record has buttons:
   - `Update` – Navigates to `update.php` with student ID in URL
   - `Delete` – Triggers a JavaScript `confirm()` box, and if confirmed, navigates to `delete.php?id={id}`
3. **delete.php** deletes the record only if a valid numeric `id` is passed.
4. **update.php** allows editing the selected student's data and updates it in the database.

---

## 🛡️ Security Considerations

- Basic protection by checking if `id` is numeric before deleting.
- Can be further improved using **prepared statements** to prevent SQL injection.
- Form validations and user authentication can be added for production-level use.

---

## ✅ Future Enhancements

- 🔐 User login and authentication system
- 🔍 Search and filter functionality
- 📊 Pagination for large datasets
- 🧾 Form validation (client + server side)
- 📦 Export to Excel or PDF
- 🎨 Enhanced UI using Bootstrap or Tailwind CSS

---

## 🧪 Requirements

- XAMPP / WAMP / Local PHP Server
- PHP 7+
- MySQL (phpMyAdmin)
- Web browser (Chrome, Firefox, etc.)

---

## 📸 Screenshots

- CREATE OPERATION
- <img width="1360" height="633" alt="image" src="https://github.com/user-attachments/assets/509693f0-f93a-45fc-801c-96255ce9fc76" />
- READ OPERATION
- <img width="1354" height="566" alt="image" src="https://github.com/user-attachments/assets/ee8b65e7-bb7b-4257-8135-d6ec9d7067f8" />
- UPDATE OPERATION
- <img width="1222" height="626" alt="image" src="https://github.com/user-attachments/assets/a7429f49-01ab-4c1f-93c8-15307d8ca12c" />
- After updating data. The data will be displayed on the page
- <img width="1366" height="511" alt="image" src="https://github.com/user-attachments/assets/7c55f61f-a636-48b8-a7bd-39468ea92563" />
- DELETE OPERATION
- After clicking on the delete button
- <img width="1360" height="478" alt="image" src="https://github.com/user-attachments/assets/94e0b850-7a53-4317-821f-cbd8221277c5" />
- After confirming ok
- <img width="1323" height="395" alt="image" src="https://github.com/user-attachments/assets/e80f648f-22c5-44f0-b092-77acda742211" />




---

## 🤝 Contribution

If you'd like to contribute, feel free to fork the repo and create a pull request. Ideas and improvements are welcome!

---

## 📄 License

This project is open-source and free to use under the [MIT License](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Author

**Shehroz (SHz)**  
[GitHub Profile](https://github.com/MuhammadShz)

---


