from aiogram.utils.keyboard import InlineKeyboardBuilder

def options_kb(options):
    kb = InlineKeyboardBuilder()
    for option in options:
        kb.button(
            text=f'• {option['attributes']['volume']} | '
                + f'{option['attributes']['type']} | '
                + f'{option['attributes']['formatted_price']}',
            callback_data=f'addToCart_' + f'{option['id']}'
        )
    kb.adjust(1)
    return kb.as_markup()