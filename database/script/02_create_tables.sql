--1 Table Genders
CREATE TABLE genders(
    gender_id SERIAL PRIMARY KEY,
    gender_name varchar(6) NOT NULL,
    gender_code varchar(2)
);

--2 Table Roles
CREATE TABLE roles(
    role_id SERIAL PRIMARY KEY,
    role_name varchar(50) NOT NULL,
    role_code varchar(20),
    description text,
    is_active boolean
);

--3 Table Permission
CREATE TABLE permissions(
    permission_id SERIAL PRIMARY KEY,
    permission_name varchar(50) NOT NULL,
    permission_code varchar(50),
    mudule varchar(20),
    description text,
    is_active boolean
);

--4 Table role_permissions
CREATE TABLE role_permissions(
    rp_id SERIAL PRIMARY KEY,
    role_id INT NOT NULL,
    permission_id INT NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT fk_role_permission_role
        FOREIGN KEY (role_id) REFERENCES roles(role_id),
    CONSTRAINT fk_role_permission_permission
        FOREIGN KEY (permission_id) REFERENCES permissions(permission_id)
);

--5 Table Users
CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password_hash TEXT NOT NULL,
    gender_id INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role_id INT NOT NULL,
    is_active BOOLEAN,
    last_login TIMESTAMP,
    profile_picture TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    CONSTRAINT fk_user_gender
        Foreign Key (gender_id) REFERENCES genders(gender_id),
    CONSTRAINT fk_user_role
        Foreign Key (role_id) REFERENCES roles(role_id)
);

--6 Table Cities
CREATE TABLE cities (
    city_id SERIAL PRIMARY KEY,
    city_name VARCHAR (50) NOT NULL
);

7 Table districts
CREATE TABLE districts(
    district_id serial PRIMARY KEY,
    district_name VARCHAR(50) NOT NULL,
    city_id INT NOT NULL,
    CONSTRAINT fk_district_city
        Foreign Key (city_id) REFERENCES cities(city_id)
);

-- 8 Table Commune 
CREATE TABLE communes(
    commune_id SERIAL PRIMARY KEY,
    commune_name VARCHAR (50) NOT NULL,
    district_id INT NOT NULL,
    CONSTRAINT fk_commune_district
        Foreign Key (district_id) REFERENCES districts(district_id)
);

--9 Table Villages
CREATE TABLE villages(
    village_id SERIAL PRIMARY KEY,
    village_name VARCHAR(50) NOT NULL,
    commune_id INT NOT NULL,
    CONSTRAINT fk_village_commune
        Foreign Key (commune_id) REFERENCES communes(commune_id)
);

--10 Table degree_levels
CREATE TABLE degrees(
    degree_id SERIAL PRIMARY KEY,
    degree_name_kh VARCHAR(100),
    degree_name_en VARCHAR(50)
);

--11 Table Faculties
CREATE TABLE faculties(
    faculty_id serial PRIMARY KEY,
    faculty_code VARCHAR(20) NOT NULL UNIQUE,
    faculty_name_kh VARCHAR(100) NOT NULL,
    faculty_name_en VARCHAR(100) NOT NULL,
    dean_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20),
    email VARCHAR(50),
    description TEXT,
    is_active BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at TIMESTAMP,
    updated_by INT,
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (updated_by) REFERENCES users(user_id)
);

--12 Table Departments
CREATE TABLE departments (
    department_id SERIAL PRIMARY KEY,
    department_code VARCHAR(20) UNIQUE NOT NULL,
    department_name_kh VARCHAR(255) NOT NULL,
    department_name_en VARCHAR(100) NOT NULL,
    faculty_id INT NOT NULL,
    description TEXT,
    is_active BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at TIMESTAMP,
    updated_by INT,
    FOREIGN KEY (faculty_id) REFERENCES faculties(faculty_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (updated_by) REFERENCES users(user_id)
);

--13 Table Majors
CREATE TABLE majors(
    major_id SERIAL PRIMARY KEY,
    major_code VARCHAR(20) NOT NULL UNIQUE,
    major_name_kh VARCHAR(100) NOT NULL,
    major_name_en VARCHAR(100) NOT NULL,
    department_id INT NOT NULL,
    faculty_id INT NOT NULL,
    degree_id INT NOT NULL,
    total_credits INT,
    description TEXT,
    is_active BOOLEAN,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_by INT,
    updated_at TIMESTAMP,
    updated_by INT,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (faculty_id) REFERENCES faculties(faculty_id),
    Foreign Key (degree_id) REFERENCES degrees(degree_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (updated_by) REFERENCES users(user_id)
);

--14 Table study_shift
CREATE TABLE study_shifts(
    shift_id SERIAL PRIMARY KEY,
    shift_name VARCHAR(20) NOT NULL,
    start_time TIME,
    end_time TIME,
    is_active BOOLEAN
);

--15 Table Sholarship
CREATE TABLE scholarships (
    scholarship_id SERIAL PRIMARY KEY,
    scholarship_code VARCHAR(20) UNIQUE NOT NULL,
    scholarship_name_kh VARCHAR(255) NOT NULL,
    scholarship_name_en VARCHAR(100) NOT NULL,
    provider_name VARCHAR(255),
    coverage_percentage DECIMAL(5,2),
    description TEXT,
    is_active BOOLEAN
);

--16 Table Student_status
CREATE TABLE student_statuses(
    status_id SERIAL PRIMARY KEY,
    status_name VARCHAR(100) NOT NULL,
    is_active BOOLEAN
);

--17 Table University_students
CREATE TABLE university_students (
    student_id SERIAL PRIMARY KEY,
    student_code varchar(20) UNIQUE,
    s_name_kh varchar(255) NOT NULL,
    s_name_en varchar(100) NOT NULL,
    gender_id INT NOT NULL,
    date_of_birth DATE NOT NULL,
    nationality varchar(20),
    religion varchar(50),
    home_number varchar(10),
    home_street varchar(20),
    home_village_id INT,
    home_commune_id INT,
    home_district_id INT,
    home_city_id INT,
    phone_number varchar(20),
    email varchar(50) UNIQUE,
    faculty_id INT NOT NULL,
    department_id INT NOT NULL,
    major_id INT NOT NULL,
    room_number INT,
    year_level INT,
    study_shift_id INT NOT NULL,
    academic_year varchar(10),
    scholarship_id INT,
    degree_id INT,
    generation INT,
    current_home_number varchar(10),
    current_street varchar(20),
    current_village_id INT,
    current_commune_id INT,
    current_district_id INT,
    current_city_id INT,
    dad_name varchar(100),
    dad_phone varchar(20),
    mom_name varchar(100),
    mom_phone varchar(20),
    enrollment_date date,
    status_id INT,
    photo text,
    created_at TIMESTAMP,
    created_by INT,
    updated_at timestamp,
    updated_by INT,
    FOREIGN KEY (gender_id) REFERENCES genders(gender_id),
    FOREIGN KEY (home_village_id) REFERENCES villages(village_id),
    FOREIGN KEY (home_commune_id) REFERENCES communes(commune_id),
    FOREIGN KEY (home_district_id) REFERENCES districts(district_id),
    FOREIGN KEY (home_city_id) REFERENCES cities(city_id),
    FOREIGN KEY (faculty_id) REFERENCES faculties(faculty_id),
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (major_id) REFERENCES majors(major_id),
    FOREIGN KEY (study_shift_id) REFERENCES study_shifts(shift_id),
    FOREIGN KEY (scholarship_id) REFERENCES scholarships(scholarship_id),
    FOREIGN KEY (degree_id) REFERENCES degrees(degree_id),
    FOREIGN KEY (current_village_id) REFERENCES villages(village_id),
    FOREIGN KEY (current_commune_id) REFERENCES communes(commune_id),
    FOREIGN KEY (current_district_id) REFERENCES districts(district_id),
    FOREIGN KEY (current_city_id) REFERENCES cities(city_id),
    FOREIGN KEY (status_id) REFERENCES student_statuses(status_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (updated_by) REFERENCES users(user_id)
);