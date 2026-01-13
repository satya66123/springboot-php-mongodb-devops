PROJECT: springboot-php-mongodb-devops
OWNER: Satya Srinath (@satya66123)

GOAL
Build a production-style DevOps repository containing:
- Spring Boot MongoDB CRUD API
- PHP UI consuming the Spring Boot API
- MongoDB as database
- Docker-compose orchestration
- Kubernetes manifests
- CI + container publish workflow (GHCR)

MODULES
1) MongoDB stack
   - docker-compose mongodb service
   - init.js seed data
   - mongo-express admin tool

2) Spring Boot API service
   - CRUD APIs under /api/employees
   - MongoDB integration using Spring Data MongoDB
   - Dockerfile with multi-stage build

3) PHP UI
   - UI for Create/List/Delete employees
   - communicates only with Spring Boot API
   - does NOT access DB directly

4) DevOps
   - CI workflow
   - docker publish to GHCR
   - Kubernetes yaml manifests for all components

SUCCESS CRITERIA
- docker-compose runs successfully
- APIs work with MongoDB
- PHP UI performs CRUD via API
- GHCR packages are created
- K8s manifests included

STATUS
- Implementation completed