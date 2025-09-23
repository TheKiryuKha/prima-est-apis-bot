from aiogram.utils.keyboard import InlineKeyboardBuilder

def edit_cart_keyboard(cart):
    kb = InlineKeyboardBuilder()

    for item in cart['attributes']['items']:
        kb.button(
            text=f'{item['attributes']['title']} | {item['attributes']['amount']} шт. | {item['attributes']['formatted_price']}',
            callback_data='none'
        )

        kb.button(
            text=f"-1",
            callback_data='test'
        )
        kb.button(
            text=f"+1",
            callback_data='test'
        )
        
    kb.adjust(1, 2)

    return kb.as_markup()