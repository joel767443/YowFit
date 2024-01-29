# Yo Health: A Comprehensive Health Tracking Application

I am developing a resilient database architecture for **Yo Health**, an innovative health app built on Laravel that aims to monitor and enhance users' overall well-being. The app encompasses diverse features, including calendar scheduling, exercise tracking, recipe management, weight monitoring, and seamless work schedule integration.

## Table of Contents
- [Scheduling System](#scheduling-system)
- [Dynamic Exercise Tracking](#dynamic-exercise-tracking)
- [Recipe Management](#recipe-management)
- [Weight Tracking](#weight-tracking)
- [Calendar Integration](#calendar-integration)
- [Work Schedule Enhancement](#work-schedule-enhancement)
- [Multiple Activity Times](#multiple-activity-times)
- [Objectives of the System](#objectives-of-the-system)
    - [Comprehensive Health Monitoring](#comprehensive-health-monitoring)
    - [Personalized Health Planning](#personalized-health-planning)
    - [Adaptive Exercise Routines](#adaptive-exercise-routines)
    - [Nutrition Management](#nutrition-management)
    - [Weight Progress Insights](#weight-progress-insights)
    - [Convenient Calendar Integration](#convenient-calendar-integration)
    - [Work-Life Balance](#work-life-balance)
    - [Flexibility and Personalization](#flexibility-and-personalization)
    - [User-Friendly Dashboard](#user-friendly-dashboard)
    - [Notification System](#notification-system)
    - [Settings and Preferences Customization](#settings-and-preferences-customization)
    - [Data Privacy and Security](#data-privacy-and-security)
- [In Conclusion](#in-conclusion)
- [Technical](#technical)
    - [Setup](#setup)
    - [CI/CD](#cicd)
    - [Code Formatting and Setup](#code-formatting-and-setup)
    - [Unit Testing and Code Coverage](#unit-testing-and-code-coverage)
    - [Database Structure](#database-structure)
    - [Tech Stack](#tech-stack)
    - [Live Notifications with Microservice](#live-notifications-with-microservice)

## Scheduling System:
Users can strategically plan their daily routines by specifying:
- Wake-up time
- Exercise sessions
- Meal times
- Sleep duration
- Relaxation intervals

for each day of the week. This personalized schedule serves as a dynamic timeline, aiding users in maintaining a healthy lifestyle.

## Dynamic Exercise Tracking:
Accommodating varying exercise routines based on the time of day and specific days of the week, users can schedule different exercises for mornings, afternoons, or evenings, aligning with their daily needs.

## Recipe Management:
Supporting healthy eating habits, the app features a recipe management system where users can access a diverse collection of recipes and associate them with specific meal times, promoting a balanced and nutritious diet.

## Weight Tracking:
**Yo Health** empowers users to log and track their weight over time, offering regular updates on progress to provide valuable insights into the effectiveness of their fitness and dietary routines.

## Calendar Integration:
The app seamlessly incorporates a calendar system, enabling users to plan and set specific times for various health-related activities. This feature facilitates easy viewing and management of health-related events on a weekly basis.

## Work Schedule Enhancement:
Schedules now include dedicated time slots for work, categorized as:
- Personal
- Job-related
- Research and Development (R&D)
- Other customizable options

This integration promotes a healthy work-life balance.

## Multiple Activity Times:
Users enjoy the flexibility of including multiple instances of exercise, meals, and work times in their schedules/calendar, supporting a detailed and personalized approach to health planning.

## Objectives of the System:

### Comprehensive Health Monitoring:
- **Goal:** Provide users with a holistic platform for monitoring and enhancing their overall well-being.
- **Features:** Scheduling, exercise tracking, recipe management, weight monitoring, and work schedule integration.

### Personalized Health Planning:
- **Goal:** Enable users to create personalized schedules for wake-up time, exercise, eating, sleep, and relaxation.
- **Features:** Dynamic scheduling system, multiple activity times, and calendar integration.

### Adaptive Exercise Routines:
- **Goal:** Cater to users with varying exercise preferences and schedules.
- **Features:** Dynamic exercise tracking based on the time of day and days of the week.

### Nutrition Management:
- **Goal:** Support users in maintaining a balanced and nutritious diet.
- **Features:** Recipe management system with a diverse collection of recipes associated with specific eating times.

### Weight Progress Insights:
- **Goal:** Provide users with valuable insights into the effectiveness of their fitness and dietary routines.
- **Features:** Weight tracking functionality with regular updates on progress.

### Convenient Calendar Integration:
- **Goal:** Facilitate easy planning and management of health-related events.
- **Features:** Integration of health activities on a calendar for daily and weekly planning.

### Work-Life Balance:
- **Goal:** Help users balance professional commitments with their health goals.
- **Features:** Enhancement of schedules to include dedicated time slots for work, categorized by type.

### Flexibility and Personalization:
- **Goal:** Offer users flexibility and personalization options for a diverse range of health planning needs.
- **Features:** Multiple activity times and customizable work schedules.

### User-Friendly Dashboard:
- **Goal:** Provide users with a centralized view of their health-related activities and progress.
- **Features:** User dashboard summarizing health-related data.

### Notification System:
- **Goal:** Keep users informed and on track with their health-related schedules.
- **Features:** Notification system for upcoming events and activities.

### Settings and Preferences Customization:
- **Goal:** Allow users to tailor the app to their specific needs and preferences.
- **Features:** Settings and preferences customization options.

### Data Privacy and Security:
- **Goal:** Assure users that their health data is secure and private.
- **Features:** Implementation of robust data privacy and security measures.

## In Conclusion
In conclusion, the **Yo Health** app seamlessly integrates scheduling, exercise tracking, recipe management, weight monitoring, and work schedule integration to provide users with a holistic and dynamic approach to health and well-being. The addition of dynamic features ensures flexibility and personalization, catering to a diverse range of user needs.

## Technical

### Setup
In terminal, run the following commands:

```bash
git clone git@github.com:joel767443/YowFitWeb.git

cd YowFitWeb

./setup.sh
```

Open a new terminal tab, making sure you are still in the *YowFitWeb* directory, and run the following commands to set Laravel permissions:

```bash
docker exec code chmod o+w ./storage/ -R
docker exec code chown www-data:www-data -R ./storage
```

You should be able to access the site at this point by visiting:

http://localhost/

http://localhost/home
### CI/CD
When the code is pushed/merged with master, github-actions.yml is processed to run tests and deploy the code when successful.

### Code Formatting and Setup
Unit Testing and Code Coverage
![coverage](https://github.com/joel767443/YowFitWeb/assets/985991/c995faaf-1417-4ce8-8422-43b9ee270fb3)

### Database Structure
*For now*
![yowfit](https://github.com/joel767443/YowFitWeb/assets/985991/a05bb9f9-937c-4f56-9ead-55dc92542413)

### Tech Stack
- PHP
- Laravel
- HTML
- Docker
- DevOps - CI/CD
- Apache
- CSS
- JavaScript
- jQuery
- MySQL
- Redis
- Git / GitHub / GitHub Actions
- Vite
### Live Notifications with Microservice
