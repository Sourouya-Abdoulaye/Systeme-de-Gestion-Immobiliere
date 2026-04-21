
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).







# 🏢 Système de Gestion Immobilière

Application web complète de gestion immobilière développée avec **Laravel** et stylisée avec **Tailwind CSS**.

---

## 📖 Description

Ce projet est une solution de gestion immobilière permettant d’administrer les biens, les propriétaires, les locataires, les contrats de location, les paiements et la maintenance.

Il vise à digitaliser et simplifier la gestion des biens immobiliers afin d’améliorer l’organisation, la transparence et l’efficacité.

---

## 🚀 Technologies utilisées

- Laravel
- PHP
- MySQL
- Tailwind CSS
- JavaScript

---

## 🧩 Fonctionnalités principales

- Gestion des utilisateurs (admin, agent, propriétaire, locataire)
- Gestion des biens immobiliers
- Gestion des unités (appartements, bureaux, etc.)
- Gestion des contrats de location
- Suivi des paiements
- Génération des factures
- Gestion des maintenances et interventions
- Gestion des images et documents
- Système de notifications

---

## 🗄️ Structure de la base de données

### 👤 utilisateurs
- id  
- nom  
- telephone  
- adresse  
- email  
- mot_de_passe  
- role (admin, agent, proprietaire, locataire)  
- created_at  
- updated_at  

---

### 🏠 proprietaires
- id  
- utilisateur_id  

---

### 👥 locataires
- id  
- utilisateur_id  

---

### 🏡 biens
- id  
- proprietaire_id  
- titre  
- description  
- type (maison, appartement, terrain, bureau)  
- adresse  
- ville  
- pays  
- prix  
- statut (disponible, loue, vendu)  

---

### 🏢 unites
- id  
- bien_id  
- nom  
- nombre_chambres  
- prix  
- statut  

---

### 📑 contrats
- id  
- bien_id / unite_id  
- locataire_id  
- date_debut  
- date_fin  
- loyer  
- caution  
- statut  

---

### 💰 paiements
- id  
- contrat_id  
- montant  
- date_paiement  
- methode  
- statut  

---

### 🧾 factures
- id  
- contrat_id  
- montant  
- date_emission  
- date_echeance  
- statut  

---

### 🔧 maintenances
- id  
- bien_id  
- locataire_id  
- description  
- statut  
- date_demande  

---

### 🛠️ interventions
- id  
- maintenance_id  
- technicien  
- cout  
- date_intervention  

---

### 📸 images_biens
- id  
- bien_id  
- chemin_image  

---

### 📍 visites
- id  
- bien_id  
- nom_client  
- date_visite  

---

### 📝 documents
- id  
- bien_id  
- type  
- fichier  

---

### 🔔 notifications
- id  
- utilisateur_id  
- message  
- lu  

---

## 🔗 Relations importantes

- 1 propriétaire → plusieurs biens  
- 1 bien → plusieurs unités  
- 1 locataire → plusieurs contrats  
- 1 contrat → plusieurs paiements  
- 1 bien → plusieurs images  

---

## ⚙️ Installation du projet

### 1. Cloner le projet
```bash
git clone https://github.com/TON_USERNAME/TON_REPO.git
cd TON_REPO