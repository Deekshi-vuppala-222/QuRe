
## 🔐 Login/Register + QR Code Generator

This project combines two simple yet functional components:

1. **Login & Registration System** (with PHP backend)
2. **QR Code Generator** (with custom styling and logo options)

---

### 📁 Project Structure


/
├── index.html             # Main Login/Register page
├── indexx.html            # QR Code Generator UI
├── login.php              # PHP login handler
├── register.php           # PHP register handler
├── qr-code-styling.js     # QR code styling library
├── script.js              # QR generator logic and interactions
└── README.md              # Project overview (this file)
```
 🔧 Features

✅ Login/Register System

* Clean and modern UI with responsive design
* Validates username and password inputs
* Stores user data (in server-side PHP — extendable with a database)

✅ QR Code Generator

* Input text or URLs
* Select from three QR styles: Basic, Medium, Advanced
* Option to upload and embed custom logo
* Supports download in **PNG** and **JPG** formats
* Built with `qr-code-styling.js` and pure JavaScript

🚀 Getting Started

1. **Clone the repository**

   ```bash
   git clone https://github.com/your-username/your-repo-name.git
   cd your-repo-name
   ```

2. **Run with a PHP server**

   ```bash
   php -S localhost:8000
   ```

3. **Open in browser**

   * Login/Register: `http://localhost:8000/index.html`
   * QR Generator: `http://localhost:8000/indexx.html`

---

### 📦 Dependencies

* No external JS libraries (except Google Fonts)
* Uses `qr-code-styling.js` (included locally)

---


---

### 🛠 Future Improvements

* Add password encryption (e.g., bcrypt in PHP)
* Connect to a real database (e.g., MySQL)
* Add QR customization (color picker, size slider)
* Implement session-based login handling

