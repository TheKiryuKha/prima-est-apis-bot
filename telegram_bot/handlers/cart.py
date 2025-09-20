from aiogram import Bot
from aiogram.types import CallbackQuery
from utils.api import add_product_to_cart

async def store(update: CallbackQuery, bot: Bot):
    option_id = update.data.split('_')[1]

    add_product_to_cart(option_id, 1, update.from_user.id) 
    # отправить запрос на дополнение
    # после запроса обновить options_keyboard
    await bot.send_message(update.from_user.id, f'Добавлено в корзину')