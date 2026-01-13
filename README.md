# springboot-php-mongodb-devops
![CI](https://github.com/satya66123/springboot-php-mongodb-devops/actions/workflows/ci.yml/badge.svg)
![License](https://img.shields.io/badge/License-MIT-green.svg)
![Java](https://img.shields.io/badge/Java-21-blue.svg)
![SpringBoot](https://img.shields.io/badge/Spring%20Boot-3.x-brightgreen.svg)
![PHP](https://img.shields.io/badge/PHP-8.x-purple.svg)
![MongoDB](https://img.shields.io/badge/MongoDB-7.x-brightgreen.svg)
![Docker](https://img.shields.io/badge/Docker-Ready-blue.svg)
![Kubernetes](https://img.shields.io/badge/Kubernetes-Manifests-blue.svg)

# springboot-php-mongodb-devops

Production-style **multi-stack DevOps repository** with:

- **Spring Boot 3 (Java 21)** REST CRUD API
- **PHP 8** Web UI (calls Spring Boot API)
- **MongoDB 7** database
- Docker Compose orchestration
- Kubernetes manifests
- GitHub Actions CI
- GHCR Docker image publishing

---

## Architecture

**PHP UI → Spring Boot API → MongoDB**

- PHP service does NOT connect to MongoDB directly
- Spring Boot is the only service connected to the DB

---

## Tech Stack

- Java 21, Spring Boot 3
- Spring Data MongoDB
- PHP 8
- MongoDB 7
- Docker / Docker Compose
- Kubernetes YAML manifests
- GitHub Actions CI/CD

---

## Services

| Service | Port | Description |
|--------|------|-------------|
| Spring Boot API | 8083 | REST API `/api/employees` |
| PHP UI | 8087 | UI for CRUD |
| MongoDB | 27017 | Database |
| Mongo Express | 8086 | Mongo admin UI |

---


## 📌 infra/mongodb/init.js

db = db.getSiblingDB("appdb");

db.createCollection("employees");

db.employees.insertMany([
  { name: "Satya", email: "satya@example.com", role: "Developer", createdAt: new Date() },
  { name: "Srinath", email: "srinath@example.com", role: "Engineer", createdAt: new Date() }
]);

---

## ✅ After this, restart Mongo container to apply init script:

docker compose down -v
docker compose up -d --build

---

## Run (Docker Compose)

1) Copy env:

cp .env.example .env

---

## Docker Build

docker compose up -d --build

---

## Endpoints

Spring Boot

✅ Health: GET /api/employees/health

✅ List: GET /api/employees

✅ Create: POST /api/employees

✅ Update: PUT /api/employees/{id}

✅ Delete: DELETE /api/employees/{id}

Example create:

curl -X POST http://localhost:8083/api/employees \
  -H "Content-Type: application/json" \
  -d '{"name":"Satya","email":"satya@company.com","role":"Developer"}'
PHP UI
Open:

http://localhost:8087/

Mongo Express
Open:

http://localhost:8086/

---

## Kubernetes
Manifests available in:

infra/k8s/
Includes:

✅ MongoDB StatefulSet + PVC

✅ Spring Boot Deployment + Service

✅ PHP Deployment + Service

✅Ingress routing

---

## Docker Images (GHCR)
docker pull ghcr.io/satya66123/springboot-service-mongo:latest
docker pull ghcr.io/satya66123/php-service-mongo:latest

---


## Project Status
|      Module	               |                    Status         |
|-----------------------------------|------------------------------|
| MongoDB setup + seed|✅ Completed |
| Spring Boot Mongo CRUD API | ✅ Completed |
| PHP UI (API integration)	 | ✅ Completed |
| Docker compose orchestration	| ✅ Completed |
| Kubernetes manifests | ✅ Completed |
| GitHub Actions CI	|   ✅ Completed |
| GHCR publish workflow + packages |  ✅ Completed |

---


## Future Enhancements

Planned upgrades (optional):

 Swagger/OpenAPI documentation

 Spring Boot validation + global exception handler

 Pagination + search filters for employees

 Nginx reverse proxy (single entry point)

 Helm chart support (K8s)

 Deployment to cloud (AWS / Azure / GCP)
 
 ---

## 👤 Author

Satya Srinath
GitHub: @satya66123
Email: satyasrinath653512@gmail.com

---

## 📜 License

✅ MIT License

Copyright (c) 2026 satya

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.



---

# ✅ FINAL Steps
After updating README:

git add README.md
git commit -m "docs: finalize polished README with completed status and roadmap"
git push

---

✅✅✅ Project Staus: Complete ✅✅✅ 