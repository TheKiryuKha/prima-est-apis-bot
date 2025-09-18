from aiogram import Bot
from aiogram.types import CallbackQuery
import requests
from config import API_URL
from keyboards.products_keyboard import products_kb

async def products(update: CallbackQuery, bot: Bot):
    await update.answer()
    products = requests.get(API_URL + 'categories/' + str(update.data.split('_')[1]) + '/products').json()['data']

    if len(products) == 1:
        print('product 1')
        await show_product(update, bot, products[0]['id'])
        return
    
    category_name = requests.get(API_URL + 'categories/' + str(update.data.split('_')[1])).json()['data']['attributes']['title']
    await bot.send_message(update.from_user.id, f'{category_name}' + f':', reply_markup=products_kb(products))


async def show_product(update: CallbackQuery, bot: Bot, product_id: int):
    print(product_id)
    update.answer(f'Work in progress')