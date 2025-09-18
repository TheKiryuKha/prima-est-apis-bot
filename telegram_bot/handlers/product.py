from aiogram import Bot
from aiogram.types import CallbackQuery
import requests
from config import API_URL
from keyboards.products_keyboard import products_kb
from utils.clear_messages import clear
from utils.api import get_products, get_category

async def products(update: CallbackQuery, bot: Bot):
    await update.answer()
    await clear(update, bot)

    products = get_products(update.data.split('_')[1])
    
    if len(products) == 1:
        print('product 1')
        await show_product(update, bot, products[0]['id'])
        return
    
    category_name = get_category(update.data.split('_')[1])['attributes']['title']
    await bot.send_message(update.from_user.id, f'{category_name}' + f':', reply_markup=products_kb(products))


async def show_product(update: CallbackQuery, bot: Bot, product_id: int):
    print(product_id)
    update.answer(f'Work in progress')