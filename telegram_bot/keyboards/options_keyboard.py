from aiogram.utils.keyboard import InlineKeyboardBuilder

def options_kb(options, cart):
    kb = InlineKeyboardBuilder()
    for option in options:
        kb.button(
            text=f'• {option['attributes']['volume']} | '
                + f'{option['attributes']['type']} | '
                + f'{option['attributes']['formatted_price']}',
            callback_data=f'addToCart_' + f'{option['id']}'
        )
    
    kb.button(
        text=f"Корзина {cart['attributes']['products_amount']} шт. | {cart['attributes']['formatted_price']}",
        callback_data='cart'
    )

    kb.adjust(1)
    return kb.as_markup()   