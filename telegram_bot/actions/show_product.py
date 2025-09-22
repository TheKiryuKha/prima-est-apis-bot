from aiogram import Bot
from aiogram.types import CallbackQuery, FSInputFile
from typing import List, Any
from keyboards.options_keyboard import options_kb
from utils.api import get_cart


async def show_product(update: CallbackQuery, bot: Bot, product: List[Any]):

    cart = get_cart(update.from_user.id)

    text = f"<b>{product['attributes']['title']}</b>\n"
    text += f"<i>{product['attributes']['type']}</i>\n\n"
    text += f"{product['attributes']['description']}\n\n"

    if product['attributes']['honey_plants'] != None:
        text += f"<i>Медоносы: {product['attributes']['honey_plants']}</i>"

    if product['attributes']['media']['type'] == 'video':
        await bot.send_video(
            chat_id=update.from_user.id,
            video=FSInputFile(product['attributes']['media']['path']),
            caption=text,
            reply_markup=options_kb(product['attributes']['options'], cart),
            parse_mode="HTML"
        )
        return
    

    await bot.send_photo(
        chat_id=update.from_user.id,
        photo=FSInputFile(product['attributes']['media']['path']),
        caption=text,
        reply_markup=options_kb(product['attributes']['options'], cart),
        parse_mode="HTML"
    )