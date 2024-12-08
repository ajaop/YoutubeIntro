from flask import Flask, request, jsonify
import whisper

app = Flask(__name__)
model = whisper.load_model("base")

def get_transcript(video_url):
    result = model.transcribe(video_url)
    return result['text']

@app.route('/get-transcript', methods=['POST'])
def fetch_transcript():
    video_url = request.json.get('video_url')
    if not video_url:
        return jsonify({"error": "No video URL provided."}), 400

    try:
        transcript = get_transcript(video_url)
        return jsonify({"transcript": transcript}), 200
    except Exception as e:
        return jsonify({"error": str(e)}), 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)