<p align="center"><a href="" target="_blank"><img src="public/images/logo.png" width="400" alt="MCDle Logo"></a></p>


## ⛏️ MCDle – Minecraft Word Game

MCDle is a browser-based puzzle game inspired by Wordle and set in the Minecraft universe.
The player guesses game-related words divided into different categories, while the logic of comparisons and daily challenges are handled on the server side.

### 🎮 Game categories

Each category has its own challenge of the day:
- 🐮 **Moby**
- 🧱 **Blocks**
- 🧰 **Items**
- 🛠️ **Crafting**

Players can solve challenges independently for each category.



##  ✨ Features

- **Wordle-style word guessing**
- **Separate daily challenge for each category**
- **Backend answer comparison**
- **Unlimited number of attempts**
- **Scoreboard:**
    - Number of attempts
    - Completion status
- **Database of words divided into categories**
- **Version system / patch notes**
- **Simple, stylized layout inspired by Minecraft**



## 🏗 Application architecture

The MCDle application was implemented as a hybrid MVC application, combining classic Laravel routing with asynchronous client-server communication.

### Presentation layer (Frontend)

- **Rendered on the server side using Blade views**
- **Classic navigation between subpages implemented by Laravel routing**
- **Gameplay interactions handled asynchronously (AJAX)**
- **Frontend sends queries to the backend and processes responses in JSON format**
- **No game logic or correct responses on the client side**
- **Answers stored in local storage**

### Application layer (Backend)

- **Application based on the Laravel framework (MVC architecture)**
- **Controllers responsible for handling game logic and communication with the database**
- **Separate endpoints returning JSON, used to handle game mechanics**
- **Generating daily passwords independently for each category (mobs, blocks, items, crafting)**
- **Input data validation**
- **All comparison logic performed on the server side**

### Communication
- **Frontend ↔ backend communicate using internal API endpoints**
- **Data is sent in JSON format**
- **Asynchronous communication eliminates page reloads during gameplay**

## 🛠 Technologies

- **PHP 8.x**
- **Laravel 9**
- **MySQL**
- **HTML / CSS**
- **JavaScript**
- **REST API (JSON)**

## 🛠 Project Status
This project is curerently still in progress.

### Implemented Features
- [x] Initial project setup
- [x] Daily mob generation system
- [x] Mob selection and comparison logic
- [x] Result evaluation
- [x] Visual comparison table with color-coded parameter feedback:
    - Green - correct value
    - Yellow - partial match
    - Red - incorrect value
    - Arrows - the value is greater or less
- [x] End-game summary screen with simplified results table
- [x] Option to start a new game after completion
- [x] Base layout and UI structure
      
### In Progress
- [ ] UI/UX improvements and layout refinements
- [ ] Instruction screen
- [ ] Expanded end-game screen
- [ ] Administrator panel (adding, editing, and managing mob pool)
- [ ] Content management system for daily mob database
- [ ] More game mods (Blocks and Items guessing)

## Kroki wymagane do kompilacji, testowego uruchomienia oraz konfiguracji aplikacji: 


 1. Sklonuj repozytorium

        git clone https://github.com/KrzysztofDabal/MC-Wordle-Game.git
        cd CinemaApp

3. Uruchomienie aplikacji
 a) Uruchomienie programu XAMPP
 • Po uruchomieniu programu należy aktywować moduły klikając przycisk start:

   – Apach
   – MySQL
   
 • Uruchomić phpmyadmin klikając przycisk $admin$ przy module MySQL
 
 • Utworzyć nową bazę danych wybierając Database i podając nazwę dla naszej bazy danych, zalecane "laravel"
 
 b) Uruchomienie programu Visual Studio Code
 
 • Po uruchomieniu programu wybieramy opcję otwórz folder, a następnie wybieramy folder "cinema_projekt"
 
 c) Uruchomienie oraz instalacja niezb˛ ednych pakietów/komponentów:
 
 • Należy otworzyć okno terminala wybierając:
 
 Terminal → Nowy terminal
 
 • Skopiować plik .env.example i zmienić jego nazwę na .env
 
         cp .env.example .env

 • Skonfiguruj bazę danych
Uwaga! jeśli ustawiono inną nazwę bazy danych należy umieścić ją w pliku .env - listing poniżej

         DB_CONNECTION=mysql
         DB_HOST=127.0.0.1
         DB_PORT=3306
         DB_DATABASE=laravel
         DB_USERNAME=root
         DB_PASSWORD=
   
 • Generujemy nowy klucz aplikacji komendą:
 
     php artisan key:generate

• Uruchamiamy migrację bazy danych komendą:

     php artisan migrate
 • Uruchamiamy seedowanie bazy komendą:

     php artisan db:seed
 d) Po zakończonej konfiguracji i instalacji uruchamiamy aplikację komendą:
 
     php artisan serve
 e) Aplikacja uruchomi się pod adresem:
 
     http://127.0.0.1:8000/
W celu otwarcia strony należy otworzyć przeglądarkę i po wpisaniu powyższego adresu otworzy się strona główna aplikacji

## 📸 Screenshots

 **Game Select Page**
![Game Select Page](public/images/screenshots/welcome_page.png)
**Mob Guessing**
![Mob Guessing](public/images/screenshots/mob_guessing.jpg)
