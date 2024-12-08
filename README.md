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
cd YoutubeIntro

##### 2. Python Setup
Install Python Dependencies: Ensure you have Python installed, then install packages:
```bash
pip install -r requirements.txt

Run Flask Server: Run the Python Flask server that handles the transcription:
```bash
python 