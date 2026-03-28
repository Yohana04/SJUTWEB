<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply from CICT</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: #1a3a63; padding: 32px 40px; }
        .header h1 { color: #ffffff; margin: 0; font-size: 20px; font-weight: 900; letter-spacing: 0.05em; text-transform: uppercase; }
        .header span { color: #FDB913; }
        .gold-bar { height: 4px; background: #FDB913; }
        .body { padding: 40px; }
        .greeting { font-size: 16px; font-weight: 700; color: #1a3a63; margin-bottom: 16px; }
        .message-box { background: #f8fafc; border-left: 4px solid #2B579A; padding: 20px 24px; border-radius: 4px; margin-bottom: 28px; color: #475569; font-size: 14px; line-height: 1.8; white-space: pre-wrap; }
        .original-label { font-size: 11px; font-weight: 900; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.15em; margin-bottom: 10px; }
        .original-msg { background: #f1f5f9; border-left: 3px solid #e2e8f0; padding: 14px 18px; border-radius: 4px; color: #94a3b8; font-size: 12px; line-height: 1.7; font-style: italic; }
        .footer { background: #f8fafc; padding: 24px 40px; border-top: 1px solid #e2e8f0; text-align: center; }
        .footer p { color: #94a3b8; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; margin: 0; }
        .footer a { color: #2B579A; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1><span>CICT</span> — St. John's University of Tanzania</h1>
        </div>
        <div class="gold-bar"></div>
        <div class="body">
            <div class="greeting">Dear {{ $contact->name }},</div>

            <div class="message-box">{{ $replyMessage }}</div>

            <div class="original-label">Your original message</div>
            <div class="original-msg">{{ $contact->message }}</div>
        </div>
        <div class="footer">
            <p>Centre for Information and Communication Technology &mdash; <a href="#">sjut.ac.tz</a></p>
            <p style="margin-top:6px;">This email is a direct reply to your inquiry. Please do not reply to this message.</p>
        </div>
    </div>
</body>
</html>
