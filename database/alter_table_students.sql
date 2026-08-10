-- =============================================
-- Complete Rebuild Migration
-- =============================================

BEGIN;

-- Drop existing table and recreate
DROP TABLE IF EXISTS students CASCADE;

CREATE TABLE students (
    -- Primary Key
    student_id BIGSERIAL PRIMARY KEY,
    
    -- Photo
    photo_path VARCHAR(255),
    
    -- Personal Information
    student_code VARCHAR(50) UNIQUE NOT NULL,
    khmer_name VARCHAR(50) NOT NULL,
    english_name VARCHAR(50) NOT NULL,
    gender_id BIGINT,
    dateofbirth DATE NOT NULL,
    nationality VARCHAR(50),
    religion VARCHAR(50),
    start_date_study DATE,
    tell1 VARCHAR(20),
    tell2 VARCHAR(20),
    enrollment_date DATE,
    study_shift_id BIGINT,
    major_id BIGINT,
    -- email VARCHAR(100), -- Uncomment if needed
    
    -- Current Address
    home_number VARCHAR(10),
    street_number VARCHAR(10),
    village_id BIGINT,
    commune_id BIGINT,
    district_id BIGINT,
    city_id BIGINT,
    
    -- Permanent/Home Address
    home_home_number VARCHAR(10),
    home_street_number VARCHAR(10),
    home_village_id BIGINT,
    home_commune_id BIGINT,
    home_district_id BIGINT,
    home_city_id BIGINT,
    
    -- Student Source / Previous School
    student_source_id BIGINT,
    previous_school VARCHAR(100),
    previous_grade VARCHAR(20),
    school_address VARCHAR(100),
    
    -- Status
    student_status VARCHAR(20) DEFAULT 'Active',
    is_active BOOLEAN DEFAULT TRUE,
    student_guardian_id BIGINT,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Add foreign key constraints
ALTER TABLE students ADD CONSTRAINT fk_students_gender 
    FOREIGN KEY (gender_id) REFERENCES genders(gender_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_study_shift 
    FOREIGN KEY (study_shift_id) REFERENCES study_shifts(study_shift_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_major 
    FOREIGN KEY (major_id) REFERENCES majors(major_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_village 
    FOREIGN KEY (village_id) REFERENCES villages(village_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_commune 
    FOREIGN KEY (commune_id) REFERENCES communes(commune_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_district 
    FOREIGN KEY (district_id) REFERENCES districts(district_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_city 
    FOREIGN KEY (city_id) REFERENCES cities(city_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_home_village 
    FOREIGN KEY (home_village_id) REFERENCES villages(village_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_home_commune 
    FOREIGN KEY (home_commune_id) REFERENCES communes(commune_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_home_district 
    FOREIGN KEY (home_district_id) REFERENCES districts(district_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_home_city 
    FOREIGN KEY (home_city_id) REFERENCES cities(city_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_source 
    FOREIGN KEY (student_source_id) REFERENCES student_sources(student_source_id) ON DELETE SET NULL;

ALTER TABLE students ADD CONSTRAINT fk_students_guardian 
    FOREIGN KEY (student_guardian_id) REFERENCES student_guardians(student_guardian_id) ON DELETE SET NULL;

-- Create indexes
CREATE INDEX idx_students_student_code ON students(student_code);
CREATE INDEX idx_students_khmer_name ON students(khmer_name);
CREATE INDEX idx_students_english_name ON students(english_name);
CREATE INDEX idx_students_dateofbirth ON students(dateofbirth);
CREATE INDEX idx_students_enrollment_date ON students(enrollment_date);
CREATE INDEX idx_students_student_status ON students(student_status);
CREATE INDEX idx_students_is_active ON students(is_active);
CREATE INDEX idx_students_gender_id ON students(gender_id);
CREATE INDEX idx_students_major_id ON students(major_id);

-- Composite indexes
CREATE INDEX idx_students_name_status ON students(khmer_name, student_status);
CREATE INDEX idx_students_enrollment_status ON students(enrollment_date, student_status);

-- Add table comments
COMMENT ON TABLE students IS 'Student information table';
COMMENT ON COLUMN students.student_id IS 'Unique student identifier';
COMMENT ON COLUMN students.student_code IS 'Unique student code';
COMMENT ON COLUMN students.khmer_name IS 'Student name in Khmer';
COMMENT ON COLUMN students.english_name IS 'Student name in English';
COMMENT ON COLUMN students.dateofbirth IS 'Student date of birth';
COMMENT ON COLUMN students.enrollment_date IS 'Date of enrollment';

-- Create trigger for updated_at
CREATE OR REPLACE FUNCTION update_updated_at_column()
RETURNS TRIGGER AS $$
BEGIN
    NEW.updated_at = CURRENT_TIMESTAMP;
    RETURN NEW;
END;
$$ language 'plpgsql';

CREATE TRIGGER update_students_updated_at 
    BEFORE UPDATE ON students 
    FOR EACH ROW 
    EXECUTE FUNCTION update_updated_at_column();

COMMIT;