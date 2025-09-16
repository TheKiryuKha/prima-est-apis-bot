from aiogram.utils.keyboard import InlineKeyboardBuilder
import requests
from config import API_URL

def create_kb():
    response = requests.get(API_URL + 'categories')
    kb = InlineKeyboardBuilder()
    for category in response.json()['data']:
        kb.button(
            text=f'{category['attributes']['title']}',
            callback_data=f'category: ' + f'{category['id']}'
        )
    kb.adjust(1)
    return kb.as_markup()