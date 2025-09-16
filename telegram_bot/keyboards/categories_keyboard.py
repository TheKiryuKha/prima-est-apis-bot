from aiogram.utils.keyboard import InlineKeyboardBuilder
import requests

def create_kb():
    response = requests.get('http://prima-est-apis-bot.test/api/v1/categories')
    kb = InlineKeyboardBuilder()
    for category in response.json()['data']:
        kb.button(
            text=f'{category['attributes']['title']}',
            callback_data=f'{category['id']}'
        )
    kb.adjust(1)
    return kb.as_markup()