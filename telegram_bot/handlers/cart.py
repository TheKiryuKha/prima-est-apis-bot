from aiogram import Bot
from aiogram.types import CallbackQuery
from utils.api import add_product_to_cart, get_cart, get_cart_with_items
from keyboards.options_keyboard import options_kb
from utils.clear_messages import clear


async def show(update: CallbackQuery, bot: Bot):
    await clear(update, bot)

    message = f"<b>Товары:</b>\n"

    cart = get_cart_with_items(update.from_user.id)
    
    for item in cart['attributes']['items']:
        message += f"\n{item['attributes']['amount']} x {item['attributes']['title']} \n"

    message += f"\n<b>Итого: {cart['attributes']['formatted_price']}</b>"

    await bot.send_message(chat_id=update.from_user.id, text=message, parse_mode="HTML")
    

async def store(update: CallbackQuery, bot: Bot): 
    update.answer()

    option_id = update.data.split('_')[1]

    product = add_product_to_cart(option_id, 1, update.from_user.id) 
    cart = get_cart(update.message.chat.id)
    
    update.answer(f"Добавлено в корзину")

    await bot.edit_message_reply_markup(
        chat_id= update.message.chat.id,
        message_id= update.message.message_id,
        reply_markup=options_kb(product['attributes']['options'], cart)
    );
