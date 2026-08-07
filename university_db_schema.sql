--
-- PostgreSQL database dump
--

\restrict JZwXt5eFxaJ2DBsQ73V97pA8Oy23eeYBDf5eV97HzyyIMVLb8a6hE2LjONS2Vsr

-- Dumped from database version 18.4
-- Dumped by pg_dump version 18.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: academic_disciplinary; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.academic_disciplinary (
    disciplinary_id bigint NOT NULL,
    student_id bigint NOT NULL,
    violation_date date NOT NULL,
    violation_type character varying(50) NOT NULL,
    description text NOT NULL,
    sanction character varying(100),
    sanction_date date,
    recorded_by bigint,
    remarks text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.academic_disciplinary OWNER TO postgres;

--
-- Name: academic_disciplinary_disciplinary_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.academic_disciplinary_disciplinary_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.academic_disciplinary_disciplinary_id_seq OWNER TO postgres;

--
-- Name: academic_disciplinary_disciplinary_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.academic_disciplinary_disciplinary_id_seq OWNED BY public.academic_disciplinary.disciplinary_id;


--
-- Name: academic_events; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.academic_events (
    event_id bigint NOT NULL,
    event_name character varying(200) NOT NULL,
    event_code character varying(20),
    event_type character varying(50),
    description text,
    event_date date NOT NULL,
    start_time time(0) without time zone,
    end_time time(0) without time zone,
    location character varying(200),
    organizer_id bigint,
    max_participants integer,
    registration_deadline date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.academic_events OWNER TO postgres;

--
-- Name: academic_events_event_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.academic_events_event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.academic_events_event_id_seq OWNER TO postgres;

--
-- Name: academic_events_event_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.academic_events_event_id_seq OWNED BY public.academic_events.event_id;


--
-- Name: academic_years; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.academic_years (
    academic_year_id bigint NOT NULL,
    academic_year_name character varying(50) NOT NULL,
    start_date date,
    end_date date,
    is_current boolean DEFAULT false NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.academic_years OWNER TO postgres;

--
-- Name: academic_years_academic_year_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.academic_years_academic_year_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.academic_years_academic_year_id_seq OWNER TO postgres;

--
-- Name: academic_years_academic_year_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.academic_years_academic_year_id_seq OWNED BY public.academic_years.academic_year_id;


--
-- Name: amounts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.amounts (
    amount_id bigint NOT NULL,
    amount_name numeric(10,2) NOT NULL,
    payment_type_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.amounts OWNER TO postgres;

--
-- Name: amounts_amount_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.amounts_amount_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.amounts_amount_id_seq OWNER TO postgres;

--
-- Name: amounts_amount_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.amounts_amount_id_seq OWNED BY public.amounts.amount_id;


--
-- Name: backup_history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.backup_history (
    backup_id bigint NOT NULL,
    backup_file_name character varying(100),
    backup_size bigint,
    backup_type character varying(20),
    status character varying(20),
    performed_by bigint,
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.backup_history OWNER TO postgres;

--
-- Name: backup_history_backup_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.backup_history_backup_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.backup_history_backup_id_seq OWNER TO postgres;

--
-- Name: backup_history_backup_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.backup_history_backup_id_seq OWNED BY public.backup_history.backup_id;


--
-- Name: books; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.books (
    book_id bigint NOT NULL,
    isbn character varying(20),
    title character varying(255) NOT NULL,
    author character varying(100),
    publisher character varying(100),
    publication_year integer,
    edition character varying(20),
    category character varying(50),
    location character varying(50),
    total_copies integer DEFAULT 1 NOT NULL,
    available_copies integer DEFAULT 1 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.books OWNER TO postgres;

--
-- Name: books_book_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.books_book_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.books_book_id_seq OWNER TO postgres;

--
-- Name: books_book_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.books_book_id_seq OWNED BY public.books.book_id;


--
-- Name: borrowings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.borrowings (
    borrowing_id bigint NOT NULL,
    student_id bigint NOT NULL,
    book_id bigint NOT NULL,
    borrow_date date,
    due_date date NOT NULL,
    return_date date,
    status character varying(20) DEFAULT 'Borrowed'::character varying NOT NULL,
    fine_amount numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    fine_paid boolean DEFAULT false NOT NULL,
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.borrowings OWNER TO postgres;

--
-- Name: borrowings_borrowing_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.borrowings_borrowing_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.borrowings_borrowing_id_seq OWNER TO postgres;

--
-- Name: borrowings_borrowing_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.borrowings_borrowing_id_seq OWNED BY public.borrowings.borrowing_id;


--
-- Name: branches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.branches (
    branch_id bigint NOT NULL,
    branch_name character varying(100) NOT NULL,
    branch_code character varying(20) NOT NULL,
    address character varying(200),
    phone character varying(20),
    email character varying(100),
    director_name character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.branches OWNER TO postgres;

--
-- Name: branches_branch_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.branches_branch_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.branches_branch_id_seq OWNER TO postgres;

--
-- Name: branches_branch_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.branches_branch_id_seq OWNED BY public.branches.branch_id;


--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: cities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cities (
    city_id bigint NOT NULL,
    city_name character varying(100) NOT NULL,
    city_code character varying(10),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cities OWNER TO postgres;

--
-- Name: cities_city_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cities_city_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cities_city_id_seq OWNER TO postgres;

--
-- Name: cities_city_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cities_city_id_seq OWNED BY public.cities.city_id;


--
-- Name: class_statuses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.class_statuses (
    status_id bigint NOT NULL,
    status_name character varying(50) NOT NULL,
    description character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.class_statuses OWNER TO postgres;

--
-- Name: class_statuses_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.class_statuses_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.class_statuses_status_id_seq OWNER TO postgres;

--
-- Name: class_statuses_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.class_statuses_status_id_seq OWNED BY public.class_statuses.status_id;


--
-- Name: class_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.class_types (
    class_type_id bigint NOT NULL,
    class_type_name character varying(50) NOT NULL,
    branch_id bigint,
    description character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.class_types OWNER TO postgres;

--
-- Name: class_types_class_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.class_types_class_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.class_types_class_type_id_seq OWNER TO postgres;

--
-- Name: class_types_class_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.class_types_class_type_id_seq OWNED BY public.class_types.class_type_id;


--
-- Name: classes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.classes (
    class_id bigint NOT NULL,
    class_name character varying(50) NOT NULL,
    class_code character varying(20),
    academic_year_id bigint,
    level_id bigint,
    room_id bigint,
    status_id bigint,
    study_shift_id bigint,
    branch_id bigint,
    class_type_id bigint,
    staff_id bigint,
    max_students integer DEFAULT 30 NOT NULL,
    current_students integer DEFAULT 0 NOT NULL,
    start_date date,
    end_date date,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.classes OWNER TO postgres;

--
-- Name: classes_class_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.classes_class_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.classes_class_id_seq OWNER TO postgres;

--
-- Name: classes_class_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.classes_class_id_seq OWNED BY public.classes.class_id;


--
-- Name: club_members; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.club_members (
    club_member_id bigint NOT NULL,
    club_id bigint NOT NULL,
    student_id bigint NOT NULL,
    join_date date,
    role character varying(50) DEFAULT 'Member'::character varying NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.club_members OWNER TO postgres;

--
-- Name: club_members_club_member_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.club_members_club_member_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.club_members_club_member_id_seq OWNER TO postgres;

--
-- Name: club_members_club_member_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.club_members_club_member_id_seq OWNED BY public.club_members.club_member_id;


--
-- Name: clubs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.clubs (
    club_id bigint NOT NULL,
    club_name character varying(100) NOT NULL,
    club_code character varying(20),
    club_type character varying(50),
    description text,
    advisor_id bigint,
    establishment_date date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.clubs OWNER TO postgres;

--
-- Name: clubs_club_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.clubs_club_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.clubs_club_id_seq OWNER TO postgres;

--
-- Name: clubs_club_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.clubs_club_id_seq OWNED BY public.clubs.club_id;


--
-- Name: communes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.communes (
    commune_id bigint NOT NULL,
    commune_name character varying(100) NOT NULL,
    district_id bigint NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.communes OWNER TO postgres;

--
-- Name: communes_commune_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.communes_commune_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.communes_commune_id_seq OWNER TO postgres;

--
-- Name: communes_commune_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.communes_commune_id_seq OWNED BY public.communes.commune_id;


--
-- Name: courses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.courses (
    course_id bigint NOT NULL,
    course_name character varying(200) NOT NULL,
    course_code character varying(20) NOT NULL,
    credits integer NOT NULL,
    theory_hours integer DEFAULT 0 NOT NULL,
    practice_hours integer DEFAULT 0 NOT NULL,
    lab_hours integer DEFAULT 0 NOT NULL,
    description text,
    prerequisite_course_id bigint,
    major_id bigint,
    semester_level integer,
    is_elective boolean DEFAULT false NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.courses OWNER TO postgres;

--
-- Name: courses_course_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.courses_course_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.courses_course_id_seq OWNER TO postgres;

--
-- Name: courses_course_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.courses_course_id_seq OWNED BY public.courses.course_id;


--
-- Name: discounts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.discounts (
    discount_id bigint NOT NULL,
    discount_name character varying(100),
    discount_percentage numeric(5,2),
    discount_amount numeric(10,2),
    valid_from date,
    valid_to date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.discounts OWNER TO postgres;

--
-- Name: discounts_discount_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.discounts_discount_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.discounts_discount_id_seq OWNER TO postgres;

--
-- Name: discounts_discount_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.discounts_discount_id_seq OWNED BY public.discounts.discount_id;


--
-- Name: districts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.districts (
    district_id bigint NOT NULL,
    district_name character varying(100) NOT NULL,
    city_id bigint NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.districts OWNER TO postgres;

--
-- Name: districts_district_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.districts_district_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.districts_district_id_seq OWNER TO postgres;

--
-- Name: districts_district_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.districts_district_id_seq OWNED BY public.districts.district_id;


--
-- Name: education_levels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.education_levels (
    education_level_id bigint NOT NULL,
    education_level_name character varying(50) NOT NULL,
    level_code character varying(10),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.education_levels OWNER TO postgres;

--
-- Name: education_levels_education_level_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.education_levels_education_level_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.education_levels_education_level_id_seq OWNER TO postgres;

--
-- Name: education_levels_education_level_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.education_levels_education_level_id_seq OWNED BY public.education_levels.education_level_id;


--
-- Name: enrollments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.enrollments (
    enrollment_id bigint NOT NULL,
    student_id bigint NOT NULL,
    schedule_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    enrollment_date date,
    status character varying(20) DEFAULT 'Enrolled'::character varying NOT NULL,
    drop_date date,
    withdraw_reason text,
    grade numeric(5,2),
    grade_letter character varying(2),
    grade_point numeric(3,2),
    is_completed boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.enrollments OWNER TO postgres;

--
-- Name: enrollments_enrollment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.enrollments_enrollment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.enrollments_enrollment_id_seq OWNER TO postgres;

--
-- Name: enrollments_enrollment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.enrollments_enrollment_id_seq OWNED BY public.enrollments.enrollment_id;


--
-- Name: event_participants; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.event_participants (
    event_participant_id bigint NOT NULL,
    event_id bigint NOT NULL,
    student_id bigint NOT NULL,
    attendance_status character varying(20) DEFAULT 'Registered'::character varying NOT NULL,
    registration_date date,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.event_participants OWNER TO postgres;

--
-- Name: event_participants_event_participant_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.event_participants_event_participant_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.event_participants_event_participant_id_seq OWNER TO postgres;

--
-- Name: event_participants_event_participant_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.event_participants_event_participant_id_seq OWNED BY public.event_participants.event_participant_id;


--
-- Name: exam_results; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.exam_results (
    exam_result_id bigint NOT NULL,
    student_id bigint NOT NULL,
    exam_schedule_id bigint NOT NULL,
    score numeric(5,2),
    grade_letter character varying(2),
    is_passed boolean DEFAULT false NOT NULL,
    remarks text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.exam_results OWNER TO postgres;

--
-- Name: exam_results_exam_result_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.exam_results_exam_result_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.exam_results_exam_result_id_seq OWNER TO postgres;

--
-- Name: exam_results_exam_result_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.exam_results_exam_result_id_seq OWNED BY public.exam_results.exam_result_id;


--
-- Name: exam_schedules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.exam_schedules (
    exam_schedule_id bigint NOT NULL,
    course_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    exam_type character varying(20) NOT NULL,
    exam_date date NOT NULL,
    start_time time(0) without time zone NOT NULL,
    end_time time(0) without time zone NOT NULL,
    room_id bigint NOT NULL,
    invigilator_id bigint,
    total_marks integer DEFAULT 100 NOT NULL,
    status character varying(20) DEFAULT 'Scheduled'::character varying NOT NULL,
    description text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.exam_schedules OWNER TO postgres;

--
-- Name: exam_schedules_exam_schedule_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.exam_schedules_exam_schedule_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.exam_schedules_exam_schedule_id_seq OWNER TO postgres;

--
-- Name: exam_schedules_exam_schedule_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.exam_schedules_exam_schedule_id_seq OWNED BY public.exam_schedules.exam_schedule_id;


--
-- Name: faculties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.faculties (
    faculty_id bigint NOT NULL,
    faculty_name character varying(100) NOT NULL,
    faculty_code character varying(20) NOT NULL,
    branch_id bigint,
    dean_name character varying(100),
    description text,
    established_date date,
    phone character varying(20),
    email character varying(100),
    website character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.faculties OWNER TO postgres;

--
-- Name: faculties_faculty_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.faculties_faculty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.faculties_faculty_id_seq OWNER TO postgres;

--
-- Name: faculties_faculty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.faculties_faculty_id_seq OWNED BY public.faculties.faculty_id;


--
-- Name: fee_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fee_types (
    fee_type_id bigint NOT NULL,
    fee_type_name character varying(100) NOT NULL,
    fee_type_code character varying(20) NOT NULL,
    description text,
    is_recurring boolean DEFAULT false NOT NULL,
    is_compulsory boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.fee_types OWNER TO postgres;

--
-- Name: fee_types_fee_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.fee_types_fee_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.fee_types_fee_type_id_seq OWNER TO postgres;

--
-- Name: fee_types_fee_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.fee_types_fee_type_id_seq OWNED BY public.fee_types.fee_type_id;


--
-- Name: genders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.genders (
    gender_id bigint NOT NULL,
    gender_name character varying(20) NOT NULL,
    gender_code character(1),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.genders OWNER TO postgres;

--
-- Name: genders_gender_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.genders_gender_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.genders_gender_id_seq OWNER TO postgres;

--
-- Name: genders_gender_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.genders_gender_id_seq OWNED BY public.genders.gender_id;


--
-- Name: grading_components; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grading_components (
    grading_component_id bigint NOT NULL,
    course_id bigint NOT NULL,
    component_name character varying(50) NOT NULL,
    component_code character varying(10),
    weight numeric(5,2) NOT NULL,
    max_score numeric(5,2) DEFAULT '100'::numeric NOT NULL,
    is_passing_required boolean DEFAULT false NOT NULL,
    order_number integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.grading_components OWNER TO postgres;

--
-- Name: grading_components_grading_component_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.grading_components_grading_component_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.grading_components_grading_component_id_seq OWNER TO postgres;

--
-- Name: grading_components_grading_component_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.grading_components_grading_component_id_seq OWNED BY public.grading_components.grading_component_id;


--
-- Name: instructor_evaluations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.instructor_evaluations (
    evaluation_id bigint NOT NULL,
    course_id bigint NOT NULL,
    staff_id bigint NOT NULL,
    student_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    teaching_quality integer NOT NULL,
    knowledge_level integer NOT NULL,
    communication integer NOT NULL,
    fairness integer NOT NULL,
    availability integer NOT NULL,
    overall_rating integer NOT NULL,
    comments text,
    evaluation_date date,
    is_anonymous boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.instructor_evaluations OWNER TO postgres;

--
-- Name: instructor_evaluations_evaluation_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.instructor_evaluations_evaluation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.instructor_evaluations_evaluation_id_seq OWNER TO postgres;

--
-- Name: instructor_evaluations_evaluation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.instructor_evaluations_evaluation_id_seq OWNED BY public.instructor_evaluations.evaluation_id;


--
-- Name: invoice_items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.invoice_items (
    invoice_item_id bigint NOT NULL,
    invoice_id bigint NOT NULL,
    fee_type_id bigint NOT NULL,
    description character varying(255) NOT NULL,
    quantity integer DEFAULT 1 NOT NULL,
    unit_price numeric(10,2) NOT NULL,
    amount numeric(10,2) NOT NULL,
    discount_applied numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.invoice_items OWNER TO postgres;

--
-- Name: invoice_items_invoice_item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.invoice_items_invoice_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.invoice_items_invoice_item_id_seq OWNER TO postgres;

--
-- Name: invoice_items_invoice_item_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.invoice_items_invoice_item_id_seq OWNED BY public.invoice_items.invoice_item_id;


--
-- Name: invoices; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.invoices (
    invoice_id bigint NOT NULL,
    invoice_number character varying(50) NOT NULL,
    student_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    issue_date date,
    due_date date,
    total_amount numeric(10,2) NOT NULL,
    paid_amount numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    discount_amount numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    status character varying(20) DEFAULT 'Pending'::character varying NOT NULL,
    payment_id bigint,
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.invoices OWNER TO postgres;

--
-- Name: invoices_invoice_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.invoices_invoice_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.invoices_invoice_id_seq OWNER TO postgres;

--
-- Name: invoices_invoice_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.invoices_invoice_id_seq OWNED BY public.invoices.invoice_id;


--
-- Name: levels; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.levels (
    level_id bigint NOT NULL,
    level_name character varying(50) NOT NULL,
    class_type_id bigint,
    level_code character varying(10),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.levels OWNER TO postgres;

--
-- Name: levels_level_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.levels_level_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.levels_level_id_seq OWNER TO postgres;

--
-- Name: levels_level_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.levels_level_id_seq OWNED BY public.levels.level_id;


--
-- Name: majors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.majors (
    major_id bigint NOT NULL,
    major_name character varying(100) NOT NULL,
    major_code character varying(20) NOT NULL,
    faculty_id bigint NOT NULL,
    description text,
    total_credits integer DEFAULT 120 NOT NULL,
    duration_years integer DEFAULT 4 NOT NULL,
    degree character varying(50) DEFAULT 'Bachelor'::character varying NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.majors OWNER TO postgres;

--
-- Name: majors_major_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.majors_major_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.majors_major_id_seq OWNER TO postgres;

--
-- Name: majors_major_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.majors_major_id_seq OWNED BY public.majors.major_id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: payment_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payment_types (
    payment_type_id bigint NOT NULL,
    money_type character varying(50),
    payment_type_name character varying(50) NOT NULL,
    description character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.payment_types OWNER TO postgres;

--
-- Name: payment_types_payment_type_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.payment_types_payment_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.payment_types_payment_type_id_seq OWNER TO postgres;

--
-- Name: payment_types_payment_type_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.payment_types_payment_type_id_seq OWNED BY public.payment_types.payment_type_id;


--
-- Name: payments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.payments (
    payment_id bigint NOT NULL,
    student_id bigint NOT NULL,
    payment_type_id bigint,
    amount_id bigint,
    fines numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    total_money numeric(10,2) NOT NULL,
    payment_date date,
    discount numeric(10,2) DEFAULT '0'::numeric NOT NULL,
    note character varying(255),
    receipt_number character varying(50),
    payment_method character varying(20),
    status character varying(20) DEFAULT 'Completed'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.payments OWNER TO postgres;

--
-- Name: payments_payment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.payments_payment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.payments_payment_id_seq OWNER TO postgres;

--
-- Name: payments_payment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.payments_payment_id_seq OWNED BY public.payments.payment_id;


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    permission_id bigint NOT NULL,
    permission_name character varying(50) NOT NULL,
    permission_code character varying(50),
    module character varying(50),
    description text,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: permissions_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_permission_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.permissions_permission_id_seq OWNER TO postgres;

--
-- Name: permissions_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_permission_id_seq OWNED BY public.permissions.permission_id;


--
-- Name: place_of_birth; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.place_of_birth (
    pfb_id bigint NOT NULL,
    city_id bigint,
    district_id bigint,
    commune_id bigint,
    village_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.place_of_birth OWNER TO postgres;

--
-- Name: place_of_birth_pfb_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.place_of_birth_pfb_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.place_of_birth_pfb_id_seq OWNER TO postgres;

--
-- Name: place_of_birth_pfb_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.place_of_birth_pfb_id_seq OWNED BY public.place_of_birth.pfb_id;


--
-- Name: prerequisites; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prerequisites (
    prerequisite_id bigint NOT NULL,
    course_id bigint NOT NULL,
    prerequisite_course_id bigint NOT NULL,
    is_required boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.prerequisites OWNER TO postgres;

--
-- Name: prerequisites_prerequisite_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.prerequisites_prerequisite_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.prerequisites_prerequisite_id_seq OWNER TO postgres;

--
-- Name: prerequisites_prerequisite_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.prerequisites_prerequisite_id_seq OWNED BY public.prerequisites.prerequisite_id;


--
-- Name: role_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.role_permissions (
    rp_id bigint NOT NULL,
    role_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.role_permissions OWNER TO postgres;

--
-- Name: role_permissions_rp_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.role_permissions_rp_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.role_permissions_rp_id_seq OWNER TO postgres;

--
-- Name: role_permissions_rp_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.role_permissions_rp_id_seq OWNED BY public.role_permissions.rp_id;


--
-- Name: roles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.roles (
    role_id bigint NOT NULL,
    role_name character varying(50) NOT NULL,
    role_code character varying(20),
    description text,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO postgres;

--
-- Name: roles_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.roles_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.roles_role_id_seq OWNER TO postgres;

--
-- Name: roles_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.roles_role_id_seq OWNED BY public.roles.role_id;


--
-- Name: rooms; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rooms (
    room_id bigint NOT NULL,
    room_name character varying(20) NOT NULL,
    room_code character varying(10),
    level_id bigint,
    capacity integer DEFAULT 30 NOT NULL,
    building character varying(50),
    floor integer,
    has_projector boolean DEFAULT false NOT NULL,
    has_whiteboard boolean DEFAULT true NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.rooms OWNER TO postgres;

--
-- Name: rooms_room_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rooms_room_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.rooms_room_id_seq OWNER TO postgres;

--
-- Name: rooms_room_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rooms_room_id_seq OWNED BY public.rooms.room_id;


--
-- Name: schedules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.schedules (
    schedule_id bigint NOT NULL,
    schedule_code character varying(20),
    class_id bigint NOT NULL,
    course_id bigint NOT NULL,
    staff_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    day_of_week integer NOT NULL,
    start_time time(0) without time zone NOT NULL,
    end_time time(0) without time zone NOT NULL,
    room_id bigint NOT NULL,
    max_students integer DEFAULT 30 NOT NULL,
    current_enrolled integer DEFAULT 0 NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.schedules OWNER TO postgres;

--
-- Name: schedules_schedule_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.schedules_schedule_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.schedules_schedule_id_seq OWNER TO postgres;

--
-- Name: schedules_schedule_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.schedules_schedule_id_seq OWNED BY public.schedules.schedule_id;


--
-- Name: scholarship_awards; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.scholarship_awards (
    scholarship_award_id bigint NOT NULL,
    student_id bigint NOT NULL,
    scholarship_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    award_amount numeric(10,2),
    award_date date,
    status character varying(20) DEFAULT 'Active'::character varying NOT NULL,
    renewal_status character varying(20),
    notes text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.scholarship_awards OWNER TO postgres;

--
-- Name: scholarship_awards_scholarship_award_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.scholarship_awards_scholarship_award_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.scholarship_awards_scholarship_award_id_seq OWNER TO postgres;

--
-- Name: scholarship_awards_scholarship_award_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.scholarship_awards_scholarship_award_id_seq OWNED BY public.scholarship_awards.scholarship_award_id;


--
-- Name: scholarships; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.scholarships (
    scholarship_id bigint NOT NULL,
    scholarship_name character varying(100) NOT NULL,
    scholarship_code character varying(20),
    scholarship_type character varying(50),
    amount numeric(10,2),
    percentage numeric(5,2),
    description text,
    provider character varying(100),
    requirements text,
    application_deadline date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.scholarships OWNER TO postgres;

--
-- Name: scholarships_scholarship_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.scholarships_scholarship_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.scholarships_scholarship_id_seq OWNER TO postgres;

--
-- Name: scholarships_scholarship_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.scholarships_scholarship_id_seq OWNED BY public.scholarships.scholarship_id;


--
-- Name: semesters; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.semesters (
    semester_id bigint NOT NULL,
    semester_name character varying(50) NOT NULL,
    semester_code character varying(10) NOT NULL,
    academic_year_id bigint NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    registration_start date,
    registration_end date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.semesters OWNER TO postgres;

--
-- Name: semesters_semester_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.semesters_semester_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.semesters_semester_id_seq OWNER TO postgres;

--
-- Name: semesters_semester_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.semesters_semester_id_seq OWNED BY public.semesters.semester_id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: specializations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.specializations (
    specialization_id bigint NOT NULL,
    specialization_name character varying(100) NOT NULL,
    specialization_code character varying(20),
    major_id bigint NOT NULL,
    description text,
    required_credits integer,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.specializations OWNER TO postgres;

--
-- Name: specializations_specialization_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.specializations_specialization_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.specializations_specialization_id_seq OWNER TO postgres;

--
-- Name: specializations_specialization_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.specializations_specialization_id_seq OWNED BY public.specializations.specialization_id;


--
-- Name: specialties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.specialties (
    specialty_id bigint NOT NULL,
    specialty_name character varying(50) NOT NULL,
    specialty_code character varying(10),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.specialties OWNER TO postgres;

--
-- Name: specialties_specialty_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.specialties_specialty_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.specialties_specialty_id_seq OWNER TO postgres;

--
-- Name: specialties_specialty_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.specialties_specialty_id_seq OWNED BY public.specialties.specialty_id;


--
-- Name: staff; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.staff (
    staff_id bigint NOT NULL,
    staff_code character varying(20) NOT NULL,
    name_english character varying(100) NOT NULL,
    name_khmer character varying(100),
    gender_id bigint,
    dateofbirth date,
    photo bytea,
    tell character varying(20),
    tell1 character varying(20),
    email character varying(100),
    bss character varying(20),
    dateof_entry date,
    education_level_id bigint,
    specialty_id bigint,
    staff_status_id bigint,
    village_id bigint,
    commune_id bigint,
    district_id bigint,
    city_id bigint,
    hire_date date,
    contract_type character varying(50),
    salary numeric(12,2),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.staff OWNER TO postgres;

--
-- Name: staff_staff_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.staff_staff_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.staff_staff_id_seq OWNER TO postgres;

--
-- Name: staff_staff_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.staff_staff_id_seq OWNED BY public.staff.staff_id;


--
-- Name: staff_statuses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.staff_statuses (
    status_id bigint NOT NULL,
    status_name character varying(50) NOT NULL,
    description character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.staff_statuses OWNER TO postgres;

--
-- Name: staff_statuses_status_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.staff_statuses_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.staff_statuses_status_id_seq OWNER TO postgres;

--
-- Name: staff_statuses_status_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.staff_statuses_status_id_seq OWNED BY public.staff_statuses.status_id;


--
-- Name: student_classes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_classes (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    class_id bigint NOT NULL,
    payment_id bigint,
    enrollment_date date,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.student_classes OWNER TO postgres;

--
-- Name: student_classes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_classes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.student_classes_id_seq OWNER TO postgres;

--
-- Name: student_classes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_classes_id_seq OWNED BY public.student_classes.id;


--
-- Name: student_grades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_grades (
    student_grade_id bigint NOT NULL,
    student_id bigint NOT NULL,
    schedule_id bigint NOT NULL,
    grading_component_id bigint NOT NULL,
    score numeric(5,2),
    grade_letter character varying(2),
    grade_point numeric(3,2),
    recorded_date date,
    recorded_by bigint,
    remarks text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.student_grades OWNER TO postgres;

--
-- Name: student_grades_student_grade_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_grades_student_grade_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.student_grades_student_grade_id_seq OWNER TO postgres;

--
-- Name: student_grades_student_grade_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_grades_student_grade_id_seq OWNED BY public.student_grades.student_grade_id;


--
-- Name: student_guardians; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_guardians (
    student_guardian_id bigint NOT NULL,
    mom_name character varying(100) NOT NULL,
    job_mom character varying(50) NOT NULL,
    mom_phone character varying(20),
    dad_name character varying(100) NOT NULL,
    job_dad character varying(50) NOT NULL,
    dad_phone character varying(20),
    guardian_name character varying(100),
    guardian_phone character varying(20),
    guardian_relationship character varying(50),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.student_guardians OWNER TO postgres;

--
-- Name: student_guardians_student_guardian_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_guardians_student_guardian_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.student_guardians_student_guardian_id_seq OWNER TO postgres;

--
-- Name: student_guardians_student_guardian_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_guardians_student_guardian_id_seq OWNED BY public.student_guardians.student_guardian_id;


--
-- Name: student_subjects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_subjects (
    student_subject_id bigint NOT NULL,
    student_id bigint NOT NULL,
    subject_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.student_subjects OWNER TO postgres;

--
-- Name: student_subjects_student_subject_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_subjects_student_subject_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.student_subjects_student_subject_id_seq OWNER TO postgres;

--
-- Name: student_subjects_student_subject_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_subjects_student_subject_id_seq OWNED BY public.student_subjects.student_subject_id;


--
-- Name: students; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.students (
    student_id bigint NOT NULL,
    student_code character varying(50) NOT NULL,
    first_name character varying(50) NOT NULL,
    last_name character varying(50) NOT NULL,
    gender_id bigint,
    dateofbirth date NOT NULL,
    place_of_birth character varying(100),
    start_date_study date,
    tell1 character varying(20),
    tell2 character varying(20),
    email character varying(100),
    photo bytea,
    village_id bigint,
    commune_id bigint,
    district_id bigint,
    city_id bigint,
    study_shift_id bigint,
    student_guardian_id bigint,
    major_id bigint,
    enrollment_year integer,
    student_status character varying(20) DEFAULT 'Active'::character varying NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    payment_id bigint
);


ALTER TABLE public.students OWNER TO postgres;

--
-- Name: students_student_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.students_student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.students_student_id_seq OWNER TO postgres;

--
-- Name: students_student_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.students_student_id_seq OWNED BY public.students.student_id;


--
-- Name: study_shifts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.study_shifts (
    study_shift_id bigint NOT NULL,
    shift_name character varying(50) NOT NULL,
    start_time time(0) without time zone NOT NULL,
    end_time time(0) without time zone NOT NULL,
    description character varying(100),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.study_shifts OWNER TO postgres;

--
-- Name: study_shifts_study_shift_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.study_shifts_study_shift_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.study_shifts_study_shift_id_seq OWNER TO postgres;

--
-- Name: study_shifts_study_shift_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.study_shifts_study_shift_id_seq OWNED BY public.study_shifts.study_shift_id;


--
-- Name: subjects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subjects (
    subject_id bigint NOT NULL,
    subject_name character varying(100) NOT NULL,
    subject_code character varying(20),
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.subjects OWNER TO postgres;

--
-- Name: subjects_subject_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.subjects_subject_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.subjects_subject_id_seq OWNER TO postgres;

--
-- Name: subjects_subject_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.subjects_subject_id_seq OWNED BY public.subjects.subject_id;


--
-- Name: system_logs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.system_logs (
    log_id bigint NOT NULL,
    user_id bigint,
    action character varying(50) NOT NULL,
    table_name character varying(50),
    record_id character varying(255),
    old_data json,
    new_data json,
    ip_address character varying(45),
    user_agent text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.system_logs OWNER TO postgres;

--
-- Name: system_logs_log_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.system_logs_log_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.system_logs_log_id_seq OWNER TO postgres;

--
-- Name: system_logs_log_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.system_logs_log_id_seq OWNED BY public.system_logs.log_id;


--
-- Name: transcripts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.transcripts (
    transcript_id bigint NOT NULL,
    student_id bigint NOT NULL,
    semester_id bigint NOT NULL,
    gpa numeric(3,2),
    total_credits_earned integer DEFAULT 0 NOT NULL,
    total_credits_attempted integer DEFAULT 0 NOT NULL,
    cgpa numeric(3,2),
    academic_standing character varying(30),
    award_date date,
    is_official boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.transcripts OWNER TO postgres;

--
-- Name: transcripts_transcript_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.transcripts_transcript_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.transcripts_transcript_id_seq OWNER TO postgres;

--
-- Name: transcripts_transcript_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.transcripts_transcript_id_seq OWNED BY public.transcripts.transcript_id;


--
-- Name: tuition_rates; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tuition_rates (
    tuition_rate_id bigint NOT NULL,
    major_id bigint NOT NULL,
    fee_type_id bigint NOT NULL,
    amount numeric(10,2) NOT NULL,
    semester_id bigint NOT NULL,
    effective_date date NOT NULL,
    end_date date,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.tuition_rates OWNER TO postgres;

--
-- Name: tuition_rates_tuition_rate_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tuition_rates_tuition_rate_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tuition_rates_tuition_rate_id_seq OWNER TO postgres;

--
-- Name: tuition_rates_tuition_rate_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tuition_rates_tuition_rate_id_seq OWNED BY public.tuition_rates.tuition_rate_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_id bigint NOT NULL,
    username character varying(50) NOT NULL,
    password_hash character varying(255) NOT NULL,
    gender_id bigint,
    email character varying(150),
    role_id bigint,
    is_active boolean DEFAULT true NOT NULL,
    last_login timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    profile_picture text
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_user_id_seq OWNER TO postgres;

--
-- Name: users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;


--
-- Name: villages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.villages (
    village_id bigint NOT NULL,
    village_name character varying(100) NOT NULL,
    commune_id bigint NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.villages OWNER TO postgres;

--
-- Name: villages_village_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.villages_village_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.villages_village_id_seq OWNER TO postgres;

--
-- Name: villages_village_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.villages_village_id_seq OWNED BY public.villages.village_id;


--
-- Name: academic_disciplinary disciplinary_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_disciplinary ALTER COLUMN disciplinary_id SET DEFAULT nextval('public.academic_disciplinary_disciplinary_id_seq'::regclass);


--
-- Name: academic_events event_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_events ALTER COLUMN event_id SET DEFAULT nextval('public.academic_events_event_id_seq'::regclass);


--
-- Name: academic_years academic_year_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_years ALTER COLUMN academic_year_id SET DEFAULT nextval('public.academic_years_academic_year_id_seq'::regclass);


--
-- Name: amounts amount_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.amounts ALTER COLUMN amount_id SET DEFAULT nextval('public.amounts_amount_id_seq'::regclass);


--
-- Name: backup_history backup_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.backup_history ALTER COLUMN backup_id SET DEFAULT nextval('public.backup_history_backup_id_seq'::regclass);


--
-- Name: books book_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.books ALTER COLUMN book_id SET DEFAULT nextval('public.books_book_id_seq'::regclass);


--
-- Name: borrowings borrowing_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.borrowings ALTER COLUMN borrowing_id SET DEFAULT nextval('public.borrowings_borrowing_id_seq'::regclass);


--
-- Name: branches branch_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.branches ALTER COLUMN branch_id SET DEFAULT nextval('public.branches_branch_id_seq'::regclass);


--
-- Name: cities city_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cities ALTER COLUMN city_id SET DEFAULT nextval('public.cities_city_id_seq'::regclass);


--
-- Name: class_statuses status_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class_statuses ALTER COLUMN status_id SET DEFAULT nextval('public.class_statuses_status_id_seq'::regclass);


--
-- Name: class_types class_type_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class_types ALTER COLUMN class_type_id SET DEFAULT nextval('public.class_types_class_type_id_seq'::regclass);


--
-- Name: classes class_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes ALTER COLUMN class_id SET DEFAULT nextval('public.classes_class_id_seq'::regclass);


--
-- Name: club_members club_member_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club_members ALTER COLUMN club_member_id SET DEFAULT nextval('public.club_members_club_member_id_seq'::regclass);


--
-- Name: clubs club_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clubs ALTER COLUMN club_id SET DEFAULT nextval('public.clubs_club_id_seq'::regclass);


--
-- Name: communes commune_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communes ALTER COLUMN commune_id SET DEFAULT nextval('public.communes_commune_id_seq'::regclass);


--
-- Name: courses course_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses ALTER COLUMN course_id SET DEFAULT nextval('public.courses_course_id_seq'::regclass);


--
-- Name: discounts discount_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.discounts ALTER COLUMN discount_id SET DEFAULT nextval('public.discounts_discount_id_seq'::regclass);


--
-- Name: districts district_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.districts ALTER COLUMN district_id SET DEFAULT nextval('public.districts_district_id_seq'::regclass);


--
-- Name: education_levels education_level_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_levels ALTER COLUMN education_level_id SET DEFAULT nextval('public.education_levels_education_level_id_seq'::regclass);


--
-- Name: enrollments enrollment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments ALTER COLUMN enrollment_id SET DEFAULT nextval('public.enrollments_enrollment_id_seq'::regclass);


--
-- Name: event_participants event_participant_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event_participants ALTER COLUMN event_participant_id SET DEFAULT nextval('public.event_participants_event_participant_id_seq'::regclass);


--
-- Name: exam_results exam_result_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results ALTER COLUMN exam_result_id SET DEFAULT nextval('public.exam_results_exam_result_id_seq'::regclass);


--
-- Name: exam_schedules exam_schedule_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules ALTER COLUMN exam_schedule_id SET DEFAULT nextval('public.exam_schedules_exam_schedule_id_seq'::regclass);


--
-- Name: faculties faculty_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faculties ALTER COLUMN faculty_id SET DEFAULT nextval('public.faculties_faculty_id_seq'::regclass);


--
-- Name: fee_types fee_type_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fee_types ALTER COLUMN fee_type_id SET DEFAULT nextval('public.fee_types_fee_type_id_seq'::regclass);


--
-- Name: genders gender_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.genders ALTER COLUMN gender_id SET DEFAULT nextval('public.genders_gender_id_seq'::regclass);


--
-- Name: grading_components grading_component_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grading_components ALTER COLUMN grading_component_id SET DEFAULT nextval('public.grading_components_grading_component_id_seq'::regclass);


--
-- Name: instructor_evaluations evaluation_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations ALTER COLUMN evaluation_id SET DEFAULT nextval('public.instructor_evaluations_evaluation_id_seq'::regclass);


--
-- Name: invoice_items invoice_item_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice_items ALTER COLUMN invoice_item_id SET DEFAULT nextval('public.invoice_items_invoice_item_id_seq'::regclass);


--
-- Name: invoices invoice_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices ALTER COLUMN invoice_id SET DEFAULT nextval('public.invoices_invoice_id_seq'::regclass);


--
-- Name: levels level_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.levels ALTER COLUMN level_id SET DEFAULT nextval('public.levels_level_id_seq'::regclass);


--
-- Name: majors major_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.majors ALTER COLUMN major_id SET DEFAULT nextval('public.majors_major_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: payment_types payment_type_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_types ALTER COLUMN payment_type_id SET DEFAULT nextval('public.payment_types_payment_type_id_seq'::regclass);


--
-- Name: payments payment_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments ALTER COLUMN payment_id SET DEFAULT nextval('public.payments_payment_id_seq'::regclass);


--
-- Name: permissions permission_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN permission_id SET DEFAULT nextval('public.permissions_permission_id_seq'::regclass);


--
-- Name: place_of_birth pfb_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth ALTER COLUMN pfb_id SET DEFAULT nextval('public.place_of_birth_pfb_id_seq'::regclass);


--
-- Name: prerequisites prerequisite_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prerequisites ALTER COLUMN prerequisite_id SET DEFAULT nextval('public.prerequisites_prerequisite_id_seq'::regclass);


--
-- Name: role_permissions rp_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_permissions ALTER COLUMN rp_id SET DEFAULT nextval('public.role_permissions_rp_id_seq'::regclass);


--
-- Name: roles role_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles ALTER COLUMN role_id SET DEFAULT nextval('public.roles_role_id_seq'::regclass);


--
-- Name: rooms room_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rooms ALTER COLUMN room_id SET DEFAULT nextval('public.rooms_room_id_seq'::regclass);


--
-- Name: schedules schedule_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules ALTER COLUMN schedule_id SET DEFAULT nextval('public.schedules_schedule_id_seq'::regclass);


--
-- Name: scholarship_awards scholarship_award_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards ALTER COLUMN scholarship_award_id SET DEFAULT nextval('public.scholarship_awards_scholarship_award_id_seq'::regclass);


--
-- Name: scholarships scholarship_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarships ALTER COLUMN scholarship_id SET DEFAULT nextval('public.scholarships_scholarship_id_seq'::regclass);


--
-- Name: semesters semester_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semesters ALTER COLUMN semester_id SET DEFAULT nextval('public.semesters_semester_id_seq'::regclass);


--
-- Name: specializations specialization_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specializations ALTER COLUMN specialization_id SET DEFAULT nextval('public.specializations_specialization_id_seq'::regclass);


--
-- Name: specialties specialty_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specialties ALTER COLUMN specialty_id SET DEFAULT nextval('public.specialties_specialty_id_seq'::regclass);


--
-- Name: staff staff_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff ALTER COLUMN staff_id SET DEFAULT nextval('public.staff_staff_id_seq'::regclass);


--
-- Name: staff_statuses status_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff_statuses ALTER COLUMN status_id SET DEFAULT nextval('public.staff_statuses_status_id_seq'::regclass);


--
-- Name: student_classes id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes ALTER COLUMN id SET DEFAULT nextval('public.student_classes_id_seq'::regclass);


--
-- Name: student_grades student_grade_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades ALTER COLUMN student_grade_id SET DEFAULT nextval('public.student_grades_student_grade_id_seq'::regclass);


--
-- Name: student_guardians student_guardian_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_guardians ALTER COLUMN student_guardian_id SET DEFAULT nextval('public.student_guardians_student_guardian_id_seq'::regclass);


--
-- Name: student_subjects student_subject_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_subjects ALTER COLUMN student_subject_id SET DEFAULT nextval('public.student_subjects_student_subject_id_seq'::regclass);


--
-- Name: students student_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students ALTER COLUMN student_id SET DEFAULT nextval('public.students_student_id_seq'::regclass);


--
-- Name: study_shifts study_shift_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.study_shifts ALTER COLUMN study_shift_id SET DEFAULT nextval('public.study_shifts_study_shift_id_seq'::regclass);


--
-- Name: subjects subject_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects ALTER COLUMN subject_id SET DEFAULT nextval('public.subjects_subject_id_seq'::regclass);


--
-- Name: system_logs log_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.system_logs ALTER COLUMN log_id SET DEFAULT nextval('public.system_logs_log_id_seq'::regclass);


--
-- Name: transcripts transcript_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transcripts ALTER COLUMN transcript_id SET DEFAULT nextval('public.transcripts_transcript_id_seq'::regclass);


--
-- Name: tuition_rates tuition_rate_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates ALTER COLUMN tuition_rate_id SET DEFAULT nextval('public.tuition_rates_tuition_rate_id_seq'::regclass);


--
-- Name: users user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);


--
-- Name: villages village_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.villages ALTER COLUMN village_id SET DEFAULT nextval('public.villages_village_id_seq'::regclass);


--
-- Name: academic_disciplinary academic_disciplinary_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_disciplinary
    ADD CONSTRAINT academic_disciplinary_pkey PRIMARY KEY (disciplinary_id);


--
-- Name: academic_events academic_events_event_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_events
    ADD CONSTRAINT academic_events_event_code_unique UNIQUE (event_code);


--
-- Name: academic_events academic_events_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_events
    ADD CONSTRAINT academic_events_pkey PRIMARY KEY (event_id);


--
-- Name: academic_years academic_years_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_years
    ADD CONSTRAINT academic_years_pkey PRIMARY KEY (academic_year_id);


--
-- Name: amounts amounts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.amounts
    ADD CONSTRAINT amounts_pkey PRIMARY KEY (amount_id);


--
-- Name: backup_history backup_history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.backup_history
    ADD CONSTRAINT backup_history_pkey PRIMARY KEY (backup_id);


--
-- Name: books books_isbn_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_isbn_unique UNIQUE (isbn);


--
-- Name: books books_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.books
    ADD CONSTRAINT books_pkey PRIMARY KEY (book_id);


--
-- Name: borrowings borrowings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.borrowings
    ADD CONSTRAINT borrowings_pkey PRIMARY KEY (borrowing_id);


--
-- Name: branches branches_branch_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.branches
    ADD CONSTRAINT branches_branch_code_unique UNIQUE (branch_code);


--
-- Name: branches branches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.branches
    ADD CONSTRAINT branches_pkey PRIMARY KEY (branch_id);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: cities cities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cities
    ADD CONSTRAINT cities_pkey PRIMARY KEY (city_id);


--
-- Name: class_statuses class_statuses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class_statuses
    ADD CONSTRAINT class_statuses_pkey PRIMARY KEY (status_id);


--
-- Name: class_types class_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class_types
    ADD CONSTRAINT class_types_pkey PRIMARY KEY (class_type_id);


--
-- Name: classes classes_class_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_class_code_unique UNIQUE (class_code);


--
-- Name: classes classes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_pkey PRIMARY KEY (class_id);


--
-- Name: club_members club_members_club_id_student_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club_members
    ADD CONSTRAINT club_members_club_id_student_id_unique UNIQUE (club_id, student_id);


--
-- Name: club_members club_members_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club_members
    ADD CONSTRAINT club_members_pkey PRIMARY KEY (club_member_id);


--
-- Name: clubs clubs_club_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clubs
    ADD CONSTRAINT clubs_club_code_unique UNIQUE (club_code);


--
-- Name: clubs clubs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clubs
    ADD CONSTRAINT clubs_pkey PRIMARY KEY (club_id);


--
-- Name: communes communes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communes
    ADD CONSTRAINT communes_pkey PRIMARY KEY (commune_id);


--
-- Name: courses courses_course_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_course_code_unique UNIQUE (course_code);


--
-- Name: courses courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (course_id);


--
-- Name: discounts discounts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.discounts
    ADD CONSTRAINT discounts_pkey PRIMARY KEY (discount_id);


--
-- Name: districts districts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.districts
    ADD CONSTRAINT districts_pkey PRIMARY KEY (district_id);


--
-- Name: education_levels education_levels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.education_levels
    ADD CONSTRAINT education_levels_pkey PRIMARY KEY (education_level_id);


--
-- Name: enrollments enrollments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments
    ADD CONSTRAINT enrollments_pkey PRIMARY KEY (enrollment_id);


--
-- Name: enrollments enrollments_student_id_schedule_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments
    ADD CONSTRAINT enrollments_student_id_schedule_id_unique UNIQUE (student_id, schedule_id);


--
-- Name: event_participants event_participants_event_id_student_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event_participants
    ADD CONSTRAINT event_participants_event_id_student_id_unique UNIQUE (event_id, student_id);


--
-- Name: event_participants event_participants_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event_participants
    ADD CONSTRAINT event_participants_pkey PRIMARY KEY (event_participant_id);


--
-- Name: exam_results exam_results_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT exam_results_pkey PRIMARY KEY (exam_result_id);


--
-- Name: exam_results exam_results_student_id_exam_schedule_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT exam_results_student_id_exam_schedule_id_unique UNIQUE (student_id, exam_schedule_id);


--
-- Name: exam_schedules exam_schedules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules
    ADD CONSTRAINT exam_schedules_pkey PRIMARY KEY (exam_schedule_id);


--
-- Name: faculties faculties_faculty_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faculties
    ADD CONSTRAINT faculties_faculty_code_unique UNIQUE (faculty_code);


--
-- Name: faculties faculties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faculties
    ADD CONSTRAINT faculties_pkey PRIMARY KEY (faculty_id);


--
-- Name: fee_types fee_types_fee_type_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fee_types
    ADD CONSTRAINT fee_types_fee_type_code_unique UNIQUE (fee_type_code);


--
-- Name: fee_types fee_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fee_types
    ADD CONSTRAINT fee_types_pkey PRIMARY KEY (fee_type_id);


--
-- Name: genders genders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.genders
    ADD CONSTRAINT genders_pkey PRIMARY KEY (gender_id);


--
-- Name: grading_components grading_components_course_id_component_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grading_components
    ADD CONSTRAINT grading_components_course_id_component_name_unique UNIQUE (course_id, component_name);


--
-- Name: grading_components grading_components_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grading_components
    ADD CONSTRAINT grading_components_pkey PRIMARY KEY (grading_component_id);


--
-- Name: instructor_evaluations instructor_evaluations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_pkey PRIMARY KEY (evaluation_id);


--
-- Name: instructor_evaluations instructor_evaluations_student_id_course_id_staff_id_semester_i; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_student_id_course_id_staff_id_semester_i UNIQUE (student_id, course_id, staff_id, semester_id);


--
-- Name: invoice_items invoice_items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice_items
    ADD CONSTRAINT invoice_items_pkey PRIMARY KEY (invoice_item_id);


--
-- Name: invoices invoices_invoice_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices
    ADD CONSTRAINT invoices_invoice_number_unique UNIQUE (invoice_number);


--
-- Name: invoices invoices_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices
    ADD CONSTRAINT invoices_pkey PRIMARY KEY (invoice_id);


--
-- Name: levels levels_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.levels
    ADD CONSTRAINT levels_pkey PRIMARY KEY (level_id);


--
-- Name: majors majors_major_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.majors
    ADD CONSTRAINT majors_major_code_unique UNIQUE (major_code);


--
-- Name: majors majors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.majors
    ADD CONSTRAINT majors_pkey PRIMARY KEY (major_id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: payment_types payment_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payment_types
    ADD CONSTRAINT payment_types_pkey PRIMARY KEY (payment_type_id);


--
-- Name: payments payments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_pkey PRIMARY KEY (payment_id);


--
-- Name: payments payments_receipt_number_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_receipt_number_unique UNIQUE (receipt_number);


--
-- Name: permissions permissions_permission_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_permission_code_unique UNIQUE (permission_code);


--
-- Name: permissions permissions_permission_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_permission_name_unique UNIQUE (permission_name);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (permission_id);


--
-- Name: place_of_birth place_of_birth_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth
    ADD CONSTRAINT place_of_birth_pkey PRIMARY KEY (pfb_id);


--
-- Name: prerequisites prerequisites_course_id_prerequisite_course_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prerequisites
    ADD CONSTRAINT prerequisites_course_id_prerequisite_course_id_unique UNIQUE (course_id, prerequisite_course_id);


--
-- Name: prerequisites prerequisites_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prerequisites
    ADD CONSTRAINT prerequisites_pkey PRIMARY KEY (prerequisite_id);


--
-- Name: role_permissions role_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_pkey PRIMARY KEY (rp_id);


--
-- Name: role_permissions role_permissions_role_id_permission_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_role_id_permission_id_unique UNIQUE (role_id, permission_id);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (role_id);


--
-- Name: roles roles_role_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_role_code_unique UNIQUE (role_code);


--
-- Name: roles roles_role_name_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_role_name_unique UNIQUE (role_name);


--
-- Name: rooms rooms_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_pkey PRIMARY KEY (room_id);


--
-- Name: schedules schedules_class_id_course_id_semester_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_class_id_course_id_semester_id_unique UNIQUE (class_id, course_id, semester_id);


--
-- Name: schedules schedules_day_of_week_start_time_end_time_room_id_semester_id_u; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_day_of_week_start_time_end_time_room_id_semester_id_u UNIQUE (day_of_week, start_time, end_time, room_id, semester_id);


--
-- Name: schedules schedules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_pkey PRIMARY KEY (schedule_id);


--
-- Name: schedules schedules_schedule_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_schedule_code_unique UNIQUE (schedule_code);


--
-- Name: scholarship_awards scholarship_awards_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards
    ADD CONSTRAINT scholarship_awards_pkey PRIMARY KEY (scholarship_award_id);


--
-- Name: scholarship_awards scholarship_awards_student_id_scholarship_id_semester_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards
    ADD CONSTRAINT scholarship_awards_student_id_scholarship_id_semester_id_unique UNIQUE (student_id, scholarship_id, semester_id);


--
-- Name: scholarships scholarships_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarships
    ADD CONSTRAINT scholarships_pkey PRIMARY KEY (scholarship_id);


--
-- Name: scholarships scholarships_scholarship_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarships
    ADD CONSTRAINT scholarships_scholarship_code_unique UNIQUE (scholarship_code);


--
-- Name: semesters semesters_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semesters
    ADD CONSTRAINT semesters_pkey PRIMARY KEY (semester_id);


--
-- Name: semesters semesters_semester_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semesters
    ADD CONSTRAINT semesters_semester_code_unique UNIQUE (semester_code);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: specializations specializations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specializations
    ADD CONSTRAINT specializations_pkey PRIMARY KEY (specialization_id);


--
-- Name: specializations specializations_specialization_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specializations
    ADD CONSTRAINT specializations_specialization_code_unique UNIQUE (specialization_code);


--
-- Name: specialties specialties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specialties
    ADD CONSTRAINT specialties_pkey PRIMARY KEY (specialty_id);


--
-- Name: staff staff_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_pkey PRIMARY KEY (staff_id);


--
-- Name: staff staff_staff_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_staff_code_unique UNIQUE (staff_code);


--
-- Name: staff_statuses staff_statuses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff_statuses
    ADD CONSTRAINT staff_statuses_pkey PRIMARY KEY (status_id);


--
-- Name: student_classes student_classes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes
    ADD CONSTRAINT student_classes_pkey PRIMARY KEY (id);


--
-- Name: student_classes student_classes_student_id_class_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes
    ADD CONSTRAINT student_classes_student_id_class_id_unique UNIQUE (student_id, class_id);


--
-- Name: student_grades student_grades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_pkey PRIMARY KEY (student_grade_id);


--
-- Name: student_grades student_grades_student_id_schedule_id_grading_component_id_uniq; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_student_id_schedule_id_grading_component_id_uniq UNIQUE (student_id, schedule_id, grading_component_id);


--
-- Name: student_guardians student_guardians_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_guardians
    ADD CONSTRAINT student_guardians_pkey PRIMARY KEY (student_guardian_id);


--
-- Name: student_subjects student_subjects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_subjects
    ADD CONSTRAINT student_subjects_pkey PRIMARY KEY (student_subject_id);


--
-- Name: student_subjects student_subjects_student_id_subject_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_subjects
    ADD CONSTRAINT student_subjects_student_id_subject_id_unique UNIQUE (student_id, subject_id);


--
-- Name: students students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (student_id);


--
-- Name: students students_student_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_student_code_unique UNIQUE (student_code);


--
-- Name: study_shifts study_shifts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.study_shifts
    ADD CONSTRAINT study_shifts_pkey PRIMARY KEY (study_shift_id);


--
-- Name: subjects subjects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects
    ADD CONSTRAINT subjects_pkey PRIMARY KEY (subject_id);


--
-- Name: subjects subjects_subject_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subjects
    ADD CONSTRAINT subjects_subject_code_unique UNIQUE (subject_code);


--
-- Name: system_logs system_logs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.system_logs
    ADD CONSTRAINT system_logs_pkey PRIMARY KEY (log_id);


--
-- Name: transcripts transcripts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transcripts
    ADD CONSTRAINT transcripts_pkey PRIMARY KEY (transcript_id);


--
-- Name: tuition_rates tuition_rates_major_id_fee_type_id_semester_id_effective_date_u; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates
    ADD CONSTRAINT tuition_rates_major_id_fee_type_id_semester_id_effective_date_u UNIQUE (major_id, fee_type_id, semester_id, effective_date);


--
-- Name: tuition_rates tuition_rates_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates
    ADD CONSTRAINT tuition_rates_pkey PRIMARY KEY (tuition_rate_id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- Name: villages villages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.villages
    ADD CONSTRAINT villages_pkey PRIMARY KEY (village_id);


--
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: students_payment_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX students_payment_id_index ON public.students USING btree (payment_id);


--
-- Name: academic_disciplinary academic_disciplinary_recorded_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_disciplinary
    ADD CONSTRAINT academic_disciplinary_recorded_by_foreign FOREIGN KEY (recorded_by) REFERENCES public.staff(staff_id);


--
-- Name: academic_disciplinary academic_disciplinary_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_disciplinary
    ADD CONSTRAINT academic_disciplinary_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: academic_events academic_events_organizer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_events
    ADD CONSTRAINT academic_events_organizer_id_foreign FOREIGN KEY (organizer_id) REFERENCES public.staff(staff_id);


--
-- Name: amounts amounts_payment_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.amounts
    ADD CONSTRAINT amounts_payment_type_id_foreign FOREIGN KEY (payment_type_id) REFERENCES public.payment_types(payment_type_id);


--
-- Name: backup_history backup_history_performed_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.backup_history
    ADD CONSTRAINT backup_history_performed_by_foreign FOREIGN KEY (performed_by) REFERENCES public.users(user_id);


--
-- Name: borrowings borrowings_book_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.borrowings
    ADD CONSTRAINT borrowings_book_id_foreign FOREIGN KEY (book_id) REFERENCES public.books(book_id) ON DELETE CASCADE;


--
-- Name: borrowings borrowings_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.borrowings
    ADD CONSTRAINT borrowings_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: class_types class_types_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.class_types
    ADD CONSTRAINT class_types_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(branch_id);


--
-- Name: classes classes_academic_year_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_academic_year_id_foreign FOREIGN KEY (academic_year_id) REFERENCES public.academic_years(academic_year_id);


--
-- Name: classes classes_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(branch_id);


--
-- Name: classes classes_class_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_class_type_id_foreign FOREIGN KEY (class_type_id) REFERENCES public.class_types(class_type_id);


--
-- Name: classes classes_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_level_id_foreign FOREIGN KEY (level_id) REFERENCES public.levels(level_id);


--
-- Name: classes classes_room_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_room_id_foreign FOREIGN KEY (room_id) REFERENCES public.rooms(room_id);


--
-- Name: classes classes_staff_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_staff_id_foreign FOREIGN KEY (staff_id) REFERENCES public.staff(staff_id);


--
-- Name: classes classes_status_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_status_id_foreign FOREIGN KEY (status_id) REFERENCES public.class_statuses(status_id);


--
-- Name: classes classes_study_shift_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.classes
    ADD CONSTRAINT classes_study_shift_id_foreign FOREIGN KEY (study_shift_id) REFERENCES public.study_shifts(study_shift_id);


--
-- Name: club_members club_members_club_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club_members
    ADD CONSTRAINT club_members_club_id_foreign FOREIGN KEY (club_id) REFERENCES public.clubs(club_id) ON DELETE CASCADE;


--
-- Name: club_members club_members_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.club_members
    ADD CONSTRAINT club_members_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: clubs clubs_advisor_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.clubs
    ADD CONSTRAINT clubs_advisor_id_foreign FOREIGN KEY (advisor_id) REFERENCES public.staff(staff_id);


--
-- Name: communes communes_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.communes
    ADD CONSTRAINT communes_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(district_id) ON DELETE CASCADE;


--
-- Name: courses courses_major_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_major_id_foreign FOREIGN KEY (major_id) REFERENCES public.majors(major_id);


--
-- Name: courses courses_prerequisite_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_prerequisite_course_id_foreign FOREIGN KEY (prerequisite_course_id) REFERENCES public.courses(course_id);


--
-- Name: districts districts_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.districts
    ADD CONSTRAINT districts_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(city_id) ON DELETE CASCADE;


--
-- Name: enrollments enrollments_schedule_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments
    ADD CONSTRAINT enrollments_schedule_id_foreign FOREIGN KEY (schedule_id) REFERENCES public.schedules(schedule_id) ON DELETE CASCADE;


--
-- Name: enrollments enrollments_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments
    ADD CONSTRAINT enrollments_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: enrollments enrollments_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.enrollments
    ADD CONSTRAINT enrollments_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: event_participants event_participants_event_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event_participants
    ADD CONSTRAINT event_participants_event_id_foreign FOREIGN KEY (event_id) REFERENCES public.academic_events(event_id) ON DELETE CASCADE;


--
-- Name: event_participants event_participants_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.event_participants
    ADD CONSTRAINT event_participants_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: exam_results exam_results_exam_schedule_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT exam_results_exam_schedule_id_foreign FOREIGN KEY (exam_schedule_id) REFERENCES public.exam_schedules(exam_schedule_id) ON DELETE CASCADE;


--
-- Name: exam_results exam_results_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT exam_results_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: exam_schedules exam_schedules_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules
    ADD CONSTRAINT exam_schedules_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(course_id);


--
-- Name: exam_schedules exam_schedules_invigilator_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules
    ADD CONSTRAINT exam_schedules_invigilator_id_foreign FOREIGN KEY (invigilator_id) REFERENCES public.staff(staff_id);


--
-- Name: exam_schedules exam_schedules_room_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules
    ADD CONSTRAINT exam_schedules_room_id_foreign FOREIGN KEY (room_id) REFERENCES public.rooms(room_id);


--
-- Name: exam_schedules exam_schedules_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_schedules
    ADD CONSTRAINT exam_schedules_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: faculties faculties_branch_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.faculties
    ADD CONSTRAINT faculties_branch_id_foreign FOREIGN KEY (branch_id) REFERENCES public.branches(branch_id);


--
-- Name: grading_components grading_components_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grading_components
    ADD CONSTRAINT grading_components_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(course_id) ON DELETE CASCADE;


--
-- Name: instructor_evaluations instructor_evaluations_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(course_id) ON DELETE CASCADE;


--
-- Name: instructor_evaluations instructor_evaluations_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: instructor_evaluations instructor_evaluations_staff_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_staff_id_foreign FOREIGN KEY (staff_id) REFERENCES public.staff(staff_id) ON DELETE CASCADE;


--
-- Name: instructor_evaluations instructor_evaluations_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.instructor_evaluations
    ADD CONSTRAINT instructor_evaluations_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: invoice_items invoice_items_fee_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice_items
    ADD CONSTRAINT invoice_items_fee_type_id_foreign FOREIGN KEY (fee_type_id) REFERENCES public.fee_types(fee_type_id);


--
-- Name: invoice_items invoice_items_invoice_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoice_items
    ADD CONSTRAINT invoice_items_invoice_id_foreign FOREIGN KEY (invoice_id) REFERENCES public.invoices(invoice_id) ON DELETE CASCADE;


--
-- Name: invoices invoices_payment_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices
    ADD CONSTRAINT invoices_payment_id_foreign FOREIGN KEY (payment_id) REFERENCES public.payments(payment_id);


--
-- Name: invoices invoices_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices
    ADD CONSTRAINT invoices_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: invoices invoices_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.invoices
    ADD CONSTRAINT invoices_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: levels levels_class_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.levels
    ADD CONSTRAINT levels_class_type_id_foreign FOREIGN KEY (class_type_id) REFERENCES public.class_types(class_type_id);


--
-- Name: majors majors_faculty_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.majors
    ADD CONSTRAINT majors_faculty_id_foreign FOREIGN KEY (faculty_id) REFERENCES public.faculties(faculty_id) ON DELETE CASCADE;


--
-- Name: payments payments_amount_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_amount_id_foreign FOREIGN KEY (amount_id) REFERENCES public.amounts(amount_id);


--
-- Name: payments payments_payment_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_payment_type_id_foreign FOREIGN KEY (payment_type_id) REFERENCES public.payment_types(payment_type_id);


--
-- Name: payments payments_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.payments
    ADD CONSTRAINT payments_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: place_of_birth place_of_birth_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth
    ADD CONSTRAINT place_of_birth_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(city_id);


--
-- Name: place_of_birth place_of_birth_commune_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth
    ADD CONSTRAINT place_of_birth_commune_id_foreign FOREIGN KEY (commune_id) REFERENCES public.communes(commune_id);


--
-- Name: place_of_birth place_of_birth_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth
    ADD CONSTRAINT place_of_birth_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(district_id);


--
-- Name: place_of_birth place_of_birth_village_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.place_of_birth
    ADD CONSTRAINT place_of_birth_village_id_foreign FOREIGN KEY (village_id) REFERENCES public.villages(village_id);


--
-- Name: prerequisites prerequisites_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prerequisites
    ADD CONSTRAINT prerequisites_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(course_id) ON DELETE CASCADE;


--
-- Name: prerequisites prerequisites_prerequisite_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prerequisites
    ADD CONSTRAINT prerequisites_prerequisite_course_id_foreign FOREIGN KEY (prerequisite_course_id) REFERENCES public.courses(course_id) ON DELETE CASCADE;


--
-- Name: role_permissions role_permissions_permission_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(permission_id) ON DELETE CASCADE;


--
-- Name: role_permissions role_permissions_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.role_permissions
    ADD CONSTRAINT role_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(role_id) ON DELETE CASCADE;


--
-- Name: rooms rooms_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rooms
    ADD CONSTRAINT rooms_level_id_foreign FOREIGN KEY (level_id) REFERENCES public.levels(level_id);


--
-- Name: schedules schedules_class_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_class_id_foreign FOREIGN KEY (class_id) REFERENCES public.classes(class_id);


--
-- Name: schedules schedules_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(course_id);


--
-- Name: schedules schedules_room_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_room_id_foreign FOREIGN KEY (room_id) REFERENCES public.rooms(room_id);


--
-- Name: schedules schedules_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: schedules schedules_staff_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.schedules
    ADD CONSTRAINT schedules_staff_id_foreign FOREIGN KEY (staff_id) REFERENCES public.staff(staff_id);


--
-- Name: scholarship_awards scholarship_awards_scholarship_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards
    ADD CONSTRAINT scholarship_awards_scholarship_id_foreign FOREIGN KEY (scholarship_id) REFERENCES public.scholarships(scholarship_id) ON DELETE CASCADE;


--
-- Name: scholarship_awards scholarship_awards_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards
    ADD CONSTRAINT scholarship_awards_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: scholarship_awards scholarship_awards_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.scholarship_awards
    ADD CONSTRAINT scholarship_awards_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: semesters semesters_academic_year_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semesters
    ADD CONSTRAINT semesters_academic_year_id_foreign FOREIGN KEY (academic_year_id) REFERENCES public.academic_years(academic_year_id) ON DELETE CASCADE;


--
-- Name: specializations specializations_major_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specializations
    ADD CONSTRAINT specializations_major_id_foreign FOREIGN KEY (major_id) REFERENCES public.majors(major_id) ON DELETE CASCADE;


--
-- Name: staff staff_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(city_id);


--
-- Name: staff staff_commune_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_commune_id_foreign FOREIGN KEY (commune_id) REFERENCES public.communes(commune_id);


--
-- Name: staff staff_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(district_id);


--
-- Name: staff staff_education_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_education_level_id_foreign FOREIGN KEY (education_level_id) REFERENCES public.education_levels(education_level_id);


--
-- Name: staff staff_gender_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_gender_id_foreign FOREIGN KEY (gender_id) REFERENCES public.genders(gender_id);


--
-- Name: staff staff_specialty_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_specialty_id_foreign FOREIGN KEY (specialty_id) REFERENCES public.specialties(specialty_id);


--
-- Name: staff staff_staff_status_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_staff_status_id_foreign FOREIGN KEY (staff_status_id) REFERENCES public.staff_statuses(status_id);


--
-- Name: staff staff_village_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_village_id_foreign FOREIGN KEY (village_id) REFERENCES public.villages(village_id);


--
-- Name: student_classes student_classes_class_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes
    ADD CONSTRAINT student_classes_class_id_foreign FOREIGN KEY (class_id) REFERENCES public.classes(class_id);


--
-- Name: student_classes student_classes_payment_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes
    ADD CONSTRAINT student_classes_payment_id_foreign FOREIGN KEY (payment_id) REFERENCES public.payments(payment_id);


--
-- Name: student_classes student_classes_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_classes
    ADD CONSTRAINT student_classes_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id);


--
-- Name: student_grades student_grades_grading_component_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_grading_component_id_foreign FOREIGN KEY (grading_component_id) REFERENCES public.grading_components(grading_component_id) ON DELETE CASCADE;


--
-- Name: student_grades student_grades_recorded_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_recorded_by_foreign FOREIGN KEY (recorded_by) REFERENCES public.staff(staff_id);


--
-- Name: student_grades student_grades_schedule_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_schedule_id_foreign FOREIGN KEY (schedule_id) REFERENCES public.schedules(schedule_id) ON DELETE CASCADE;


--
-- Name: student_grades student_grades_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_grades
    ADD CONSTRAINT student_grades_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: student_subjects student_subjects_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_subjects
    ADD CONSTRAINT student_subjects_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id);


--
-- Name: student_subjects student_subjects_subject_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_subjects
    ADD CONSTRAINT student_subjects_subject_id_foreign FOREIGN KEY (subject_id) REFERENCES public.subjects(subject_id);


--
-- Name: students students_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(city_id);


--
-- Name: students students_commune_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_commune_id_foreign FOREIGN KEY (commune_id) REFERENCES public.communes(commune_id);


--
-- Name: students students_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(district_id);


--
-- Name: students students_gender_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_gender_id_foreign FOREIGN KEY (gender_id) REFERENCES public.genders(gender_id);


--
-- Name: students students_major_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_major_id_foreign FOREIGN KEY (major_id) REFERENCES public.majors(major_id);


--
-- Name: students students_payment_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_payment_id_foreign FOREIGN KEY (payment_id) REFERENCES public.payments(payment_id) ON DELETE SET NULL;


--
-- Name: students students_student_guardian_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_student_guardian_id_foreign FOREIGN KEY (student_guardian_id) REFERENCES public.student_guardians(student_guardian_id);


--
-- Name: students students_study_shift_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_study_shift_id_foreign FOREIGN KEY (study_shift_id) REFERENCES public.study_shifts(study_shift_id);


--
-- Name: students students_village_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_village_id_foreign FOREIGN KEY (village_id) REFERENCES public.villages(village_id);


--
-- Name: system_logs system_logs_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.system_logs
    ADD CONSTRAINT system_logs_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(user_id);


--
-- Name: transcripts transcripts_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transcripts
    ADD CONSTRAINT transcripts_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: transcripts transcripts_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.transcripts
    ADD CONSTRAINT transcripts_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(student_id) ON DELETE CASCADE;


--
-- Name: tuition_rates tuition_rates_fee_type_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates
    ADD CONSTRAINT tuition_rates_fee_type_id_foreign FOREIGN KEY (fee_type_id) REFERENCES public.fee_types(fee_type_id);


--
-- Name: tuition_rates tuition_rates_major_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates
    ADD CONSTRAINT tuition_rates_major_id_foreign FOREIGN KEY (major_id) REFERENCES public.majors(major_id);


--
-- Name: tuition_rates tuition_rates_semester_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tuition_rates
    ADD CONSTRAINT tuition_rates_semester_id_foreign FOREIGN KEY (semester_id) REFERENCES public.semesters(semester_id);


--
-- Name: users users_gender_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_gender_id_foreign FOREIGN KEY (gender_id) REFERENCES public.genders(gender_id);


--
-- Name: users users_role_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(role_id);


--
-- Name: villages villages_commune_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.villages
    ADD CONSTRAINT villages_commune_id_foreign FOREIGN KEY (commune_id) REFERENCES public.communes(commune_id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict JZwXt5eFxaJ2DBsQ73V97pA8Oy23eeYBDf5eV97HzyyIMVLb8a6hE2LjONS2Vsr

