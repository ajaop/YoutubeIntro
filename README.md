# YouTube Intro Generator

This is a one-page web application for generating catchy YouTube intros from videos. It transcribes the video's audio using Python with the Whisper package, then generates an intro based on the transcription using the OpenAI API. The frontend is built with Vue.js to handle file uploads, while the backend is powered by Laravel to manage API requests and responses.

## Features
- **Transcribe videos**: Upload a video, and it gets transcribed using Whisper (Python).
- **Generate YouTube intro**: Using the transcription, an intro is generated through the OpenAI API in Laravel.
- **Frontend for file upload**: A simple Vue.js interface for uploading videos and displaying the generated intro.

## Technologies Used
- **Transcription**: Whisper (Python)
- **Backend**: Laravel & OpenAI API
- **Frontend**: Vue.js

## Setup Instructions

Follow these steps to set up and run the application locally.

### Prerequisites

1. PHP (version 7.4 or higher)
2. Composer (for Laravel dependencies)
3. Node.js and npm (for Vue.js frontend)
4. Python
5. OpenAI API key

### Installation Steps

#### 1. Clone the Repository
Clone this repository to your local machine:
```bash
git clone https://github.com/yourusername/youtube-intro-generator.git
```

##### 2. Python Setup
Install Python Dependencies: Ensure you have Python installed, then install packages:
```bash
cd YoutubeIntro/python_scripts
pip install -r requirements.txt
```

Run Flask Server: Run the Python Flask server that handles the transcription:
```bash
python get_transcript.py
```

##### 3. Backend Setup (Laravel)
Install Composer Dependencies: In the project root directory, run:
```bash
cd YoutubeIntro/youtube_intro_backend
composer install
```

Set up the .env File: Copy the .env.example to .env:
```bash
cp .env.example .env
```

Update the following environment variables:

OPENAI_API_KEY=your-openai-api-key

Ensure that the Python Flask server URL is correctly configured in the IntroController (http://127.0.0.1:5000/get-transcript).

Start the Laravel Development Server: Run the following to start the backend server:
```bash
php artisan serve
```

##### 4. Frontend Setup (Vue.js)
Install Node.js Dependencies: In the project directory, run:
```bash
cd YoutubeIntro/youtube_intro_frontend
npm install
```
Build the Frontend: To build the frontend assets:
```bash
npm run dev
```

### Usage
##### 1. Open the Application: Visit http://localhost:8000 in your browser.

##### 2. Upload a Video:
Use the file upload interface to upload a video file.
The video will be processed and transcribed by the Flask server using Whisper (Python).

##### 3. Generate YouTube Intro:
Once the transcription is complete, the Laravel API will send the transcript to OpenAI, which will generate a catchy YouTube intro based on the content.
The generated intro will be displayed on the page.

### Processing Time Note
For videos up to 20 minutes, the process (transcription and intro generation) may take up to 1 minute to complete. Please be patient as the application processes the video and generates the intro.