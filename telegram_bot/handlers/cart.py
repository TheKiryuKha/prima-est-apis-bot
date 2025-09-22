from aiogram import Bot
from aiogram.types import CallbackQuery
from utils.api import add_product_to_cart, get_cart
from utils.clear_messages import clear
from keyboards.options_keyboard import options_kb


async def store(update: CallbackQuery, bot: Bot):
    # update.answer()

    option_id = update.data.split('_')[1]

    # вернет продукт. Продукт добавим после
    product = add_product_to_cart(option_id, 1, update.from_user.id) 
    cart = get_cart(update.message.chat.id)

    update.answer(f"Добавлено в корзину")

    # запрос к api получить продукт по его опции

    await bot.edit_message_reply_markup(
        chat_id= update.message.chat.id,
        message_id= update.message.message_id,
        reply_markup=options_kb(product['attributes']['options'], cart)
    );
