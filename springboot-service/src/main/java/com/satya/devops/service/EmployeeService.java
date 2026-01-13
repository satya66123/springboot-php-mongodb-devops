package com.satya.devops.service;

import com.satya.devops.entity.Employee;
import com.satya.devops.repository.EmployeeRepository;
import org.springframework.stereotype.Service;

import java.util.List;

@Service
public class EmployeeService {

    private final EmployeeRepository repo;

    public EmployeeService(EmployeeRepository repo) {
        this.repo = repo;
    }

    public List<Employee> getAll() {
        return repo.findAll();
    }

    public Employee create(Employee e) {
        return repo.save(e);
    }

    public Employee update(String id, Employee updated) {
        Employee existing = repo.findById(id)
                .orElseThrow(() -> new RuntimeException("Employee not found: " + id));

        existing.setName(updated.getName());
        existing.setEmail(updated.getEmail());
        existing.setRole(updated.getRole());

        return repo.save(existing);
    }

    public void delete(String id) {
        repo.deleteById(id);
    }
}
